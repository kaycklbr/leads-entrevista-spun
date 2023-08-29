<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeadsController extends Controller
{
    //

    public function index() {
        $leads = \Auth::user()->leads()->get();
        \Log::debug($leads);
        return view('leads', compact('leads'));
    }
}
