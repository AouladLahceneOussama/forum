<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Response;
use Livewire\Component;

class RepliesTable extends Component
{
    public $replies;
    public $responses;

    public function render()
    {
        return view('livewire.replies-table');
    }
    
    // Validate the response to be published
    public function validateResponse($question_id, $reply_id)
    {
        $r = Response::find($reply_id)->update(['validated' => true]);
        if($r)
            $this->responses = Response::where('question_id', $question_id)->get();

        // increment the response count
        $q = Question::find($question_id);
        $q->update(['response_count', $q->response_count++]);
    }

    // ignore the response to stay unpublished or to be deleted
    public function ignoreResponse($question_id, $reply_id)
    {
        Response::find($reply_id)->delete();
        $this->responses = Response::where('question_id', $question_id)->get();
    }
}
