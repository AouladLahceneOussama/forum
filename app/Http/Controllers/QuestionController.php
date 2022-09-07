<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function index()
    {
        $questions = Question::with('responses')->paginate(10);
        $count = Question::count();

        return view('questions.index', compact('questions', 'count'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'question' => 'required|string',
            ],
            [
                'question.required' => 'Required'
            ]
        );

        Question::create([
            'question' => $request->question
        ]);

        return redirect()->route('questions');
    }

    public function update($question_id)
    {
        $question = Question::findOrFail($question_id);
        return view('questions.update', compact('question'));
    }

    //  Save after upate
    public function save(Request $request)
    {
        $request->validate(
            [
                'question' => 'required|string',
            ],
            [
                'question.required' => 'Required'
            ]
        );

        Question::find($request->question_id)->update([
            'title' => $request->title != '' ? $request->title : null,
            'question' => $request->question
        ]);

        return redirect()->route('questions');
    }

    public function destroy($id)
    {
        Question::find($id)->delete();
        return redirect()->route('questions');
    }
}
