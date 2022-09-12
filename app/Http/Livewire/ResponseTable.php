<?php

namespace App\Http\Livewire;

use App\Models\Question;
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
        $r = Response::find($response_id)->update(['validated' => true]);
        if($r)
            $this->responses = Response::where('question_id', $this->question_id)->get();

        // increment the response count
        $q = Question::find($this->question_id);
        $q->update(['response_count', $q->response_count++]);
    }

    // ignore the response to stay unpublished or to be deleted
    public function ignoreResponse($response_id)
    {
        Response::find($response_id)->delete();
        $this->responses = Response::where('question_id', $this->question_id)->get();
    }
}
