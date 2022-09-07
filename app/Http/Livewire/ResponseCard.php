<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Response;
use Livewire\Component;

class ResponseCard extends Component
{
    public $question;
    public $name;
    public $email;
    public $response;

    public $responses;

    public function render()
    {
        return view('livewire.response-card');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'response' => 'required|string|max:255'
        ]);

        Response::create([
            'question_id' => $this->question->id,
            'response' => $this->response,
            'name' => $this->name,
            'email' => $this->email
        ]);

        // increment the response count
        $q = Question::find($this->question->id);
        $q->update(['response_count', $q->response_count++]);

        session()->flash('message', 'Enregistree.');
        $this->response='';
        $this->name='';
        $this->email='';
    }

    public function loadResponses($question_id)
    {
        $this->responses = Question::with('responses')->where([
            ['validated', '=',  true],
            ['question_id', '=', $question_id]
        ])->get();
    }
}
