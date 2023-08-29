<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuizController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $quizzes = \Auth::user()->quizzes()->get();
        return view('home', compact('quizzes'));
    }

    public function create () {
        return view('quiz.create');
    }

    public function store (Request $request){
        $user = \Auth::user();

        $data = $request->all();

        
        DB::beginTransaction();
        try{
            $questions_ids = $data['question_id'];

            $quiz = new Quiz();
            $quiz->user_id = $user->id;
            $quiz->name = $data['name'];

            $slug = Str::slug($data['name']);
            $count = 2;
            while (Quiz::where('slug', $slug)->first()) {
                $slug = Str::slug($data['name']) . '-' . $count;
                $count++;
            }
            $quiz->slug = $slug;

            $quiz->save();

            foreach ($questions_ids as $qid){
                $question = new Question();
                $question->quiz_id = $quiz->id;
                $question->text = $data["question_$qid"];
                $question->correct_answer = $data["alternative_checked_$qid"];
                $alternatives = [];
                foreach($data as $key => $val){
                    if(strpos($key, "alternative_{$qid}_")!== false){

                        $alternative = explode('_', $key);
                        $alternative = end($alternative);

                        $alternatives = array_merge($alternatives, [
                            $alternative => $val
                        ]);
                    }
                }

                $question->alternatives = json_encode($alternatives);

                $question->save();
            }
            
            DB::commit();
            return redirect()->route('home');

        }catch(\Exception $e){
            DB::rollBack();
            \Log::debug($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

    public function delete (Request $request, $id) {
        $quiz = Quiz::find($id);
        if($quiz->user_id !== \Auth::id()){
            return abort(403);
        }
        $quiz->delete();
        return redirect()->route('home');
    }

    public function show (Request $request, $id) {
        $quiz = Quiz::find($id);
        if($quiz->user_id !== \Auth::id()){
            return abort(403);
        }
        return view('quiz.show', compact('quiz'));
    }
}
