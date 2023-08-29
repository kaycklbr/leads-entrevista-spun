<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index (Request $request, string $slug) {

        $data = Quiz::where('slug', $slug)->first();
        
        if(!$data){
            return abort(404);
        }

        return view('guest.index', ['quiz' => $data]);
    }
}
