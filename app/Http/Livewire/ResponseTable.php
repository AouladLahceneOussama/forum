<?php

namespace App\Http\Livewire;

use App\Models\Response;
use Livewire\Component;

class ResponseTable extends Component
{
    public $responses;
    public $question_id;

    public function render()
    {
        return view('livewire.response-table');
    }

    public function mount($question_id)
    {   
        $this->question_id = $question_id;
        $this->responses = Response::where('question_id', $this->question_id)->get();
    }

    // Validate the response to be published
    public function validateResponse($response_id)
    {
        Response::find($response_id)->update(['validated' => true]);
        $this->responses = Response::where('question_id', $this->question_id)->get();
    }

    // ignore the response to stay unpublished or to be deleted
    public function ignoreResponse($response_id)
    {
        Response::find($response_id)->delete();
        $this->responses = Response::where('question_id', $this->question_id)->get();
    }
}
