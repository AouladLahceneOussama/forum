<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Question;
use App\Models\Response;
use Livewire\Component;

class ResponseCard extends Component
{
    public $responseModal = false;
    public $question;
    public $name;
    public $email;
    public $pseudo;
    public $response;

    public $responses = [];

    // likes and dislikes
    public $questionLikes = 0;

    public function render()
    {
        return view('livewire.response-card');
    }

    // open/close response modal
    public function toggleResponseModal()
    {
        $this->responseModal = !$this->responseModal;
    }

    // private function fetchReply($id){
    //     return Response::where([
    //         ['question_id', $this->question->id],
    //         ['parent_response_id', $id]
    //     ])->get();
    // }

    // private function getReply($reply)
    // {
    //     return Response::where([
    //         ['question_id', '=', $reply->question_id],
    //         ['parent_response_id', '=', $reply->id],
    //     ])->first();
    // }

    public function mount()
    {
        $this->responses = Response::where([
            ['validated', '=',  1],
            ['question_id', '=', $this->question->id],
            ['parent_response_id', '=', null],
        ])->get();

        $this->questionLikes = count(Like::where('question_id', $this->question->id)->get());
    }

    public function likeQuestion($question_id)
    {
        $liked = Like::where([
            ['question_id', '=', $question_id],
            ['response_id', '=', null],
            ['user_ip', '=', request()->ip()]
        ])->first();

        if ($liked == null) {
            Like::create([
                'question_id' => $question_id,
                'response_id' => null,
                'likes' => 1,
                'user_ip' => request()->ip()
            ]);

            $this->questionLikes++;
        } else {
            $liked->delete();
            $this->questionLikes--;
        }
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'pseudo' => 'required|string',
            'response' => 'required|string|max:255'
        ], [
            'name.required' => __('Required'),
            'email.required' => __('Required'),
            'email.email' => __('Invalid email'),
            'pseudo.required' => __('Required'),
            'response.required' => __('Required'),
            'response.max' => __('Too long')
        ]);

        Response::create([
            'question_id' => $this->question->id,
            'response' => $this->response,
            'name' => $this->name,
            'email' => $this->email,
            'pseudo' => $this->pseudo
        ]);

        session()->flash('message', 'Saved');
        $this->response = '';
        $this->name = '';
        $this->email = '';
        $this->pseudo = '';
    }
}
