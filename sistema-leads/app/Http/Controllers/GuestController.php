<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessLead;
use App\Models\Answer;
use App\Models\Lead;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index (Request $request, string $slug) {

        $cacheKey = 'quiz:' . $slug;

        if(Cache::has($cacheKey)) {
            $quiz = Cache::get($cacheKey);
        } else {
            
            $quiz = Quiz::where('slug', $slug)->with('questions')->first();

            if(!$quiz){
                return abort(404);
            }

            $quiz = $quiz->toJson();

            Cache::put($cacheKey, $quiz, now()->addDay());
        }
        

        return view('guest.index', ['quiz' => json_decode($quiz)]);
    }

    public function store(Request $request, string $slug){
        $quiz = Quiz::where('slug', $slug)->with('questions')->first();
        
        if(!$quiz){
            return abort(404);
        }

        $data = $request->all();

        DB::beginTransaction();
        try{

            $lead = Lead::firstOrCreate([
                'email' => $data['email']
            ], [
                'name' => $data['name'],
                'user_id' => $quiz->user_id,
                'quiz_id' => $quiz->id
            ]);
    
            foreach($data as $key => $val){
                if(strpos($key, "question_")!== false){
    
                    $question_id = explode('_', $key);
                    $question_id = end($question_id);
    
                    $question = Question::find($question_id);
                    if(!$question){
                        continue;
                    }
    
                    $answer = new Answer();
                    $answer->question_id = $question_id;
                    $answer->lead_id = $lead->id;
                    $answer->answer_option = $val;
                    $answer->status = $question->correct_answer === $val ? 'correct' : 'incorrect';
                    $answer->save();
    
                }
            }

            
            DB::commit();

            if($lead->wasRecentlyCreated){
                // Envia novos leads para a fila
                ProcessLead::dispatch($lead)->onQueue('leads');
            }

            return redirect()->route('thanks', ['slug' => $slug]);
    
        }catch(\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
        }

    }

    public function thanks(Request $request, string $slug){
        ProcessLead::dispatch(Lead::first())->onQueue('leads');
        $quiz = Quiz::where('slug', $slug)->with('questions')->first();
        if(!$quiz){
            return abort(404);
        }

        return view('guest.thanks', compact('quiz'));
    }
}
