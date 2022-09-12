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

    public function showReplies($question_id, $response_id)
    {
        
        $replies = Response::where([
            ['question_id', '=', $question_id],
            ['parent_response_id', '=', $response_id],
        ])->get();

        return view('responses.replies', compact('replies'));
    }
}
