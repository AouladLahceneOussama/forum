<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    //
    public function show($question_id)
    {
        $count = Response::where('question_id', $question_id)->count();
        return view('responses.index', compact('question_id', 'count'));
    }
}
