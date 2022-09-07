<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    //
    public function index(){
        $questions = Question::with('responses')->get();
        return view('forum', compact('questions'));
    }
}
