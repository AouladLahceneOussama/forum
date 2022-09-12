<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Response;
use Livewire\Component;

class ResponseItem extends Component
{

    public $response;
    public $question;
    public $likes = 0;
    public $dislikes = 0;

    public $name;
    public $email;
    public $pseudo;
    public $reply;

    public $loadMoreReplies = false;
    public $moreReplies;

    public function render()
    {
        return view('livewire.response-item');
    }

    public function mount($response)
    {
        $this->response = $response;
        $this->likes = Like::where([
            ['question_id', "=", $this->question->id],
            ['response_id', "=", $this->response->id],
            ['likes', "=", 1]
        ])->count();

        $this->dislikes = Like::where([
            ['question_id', "=", $this->question->id],
            ['response_id', "=", $this->response->id],
            ['dislikes', "=", 1]
        ])->count();
    }

    public function loadMoreReplies(){
        $this->loadMoreReplies = !$this->loadMoreReplies;
        $this->moreReplies = $this->response->validatedReplies($this->response);
    }

    public function interactionLikes($intereaction, $response_id)
    {
        $liked = Like::where(
            [
                ['question_id', "=", $this->question->id],
                ['response_id', "=", $response_id],
                ['user_ip', "=", request()->ip()],
                ["$intereaction", "=", 1]
            ],
        )->first();

        if ($liked == null) {
            Like::create([
                'question_id' => $this->question->id,
                'response_id' => $response_id,
                "$intereaction" => 1,
                'user_ip' => request()->ip()
            ]);

            $intereaction == 'likes' ? $this->likes++ : $this->dislikes++;
        }else{
            $liked->delete();
            $intereaction == 'likes' ? $this->likes-- : $this->dislikes--;
        }
    }

    public function save(){
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'pseudo' => 'required|string',
            'reply' => 'required|string|max:255'
        ], [
            'name.required' => __('Required'),
            'email.required' => __('Required'),
            'email.email' => __('Invalid email'),
            'pseudo.required' => __('Required'),
            'reply.required' => __('Required'),
            'reply.max' => __('Too long')
        ]);

        // dd($this->response->id,);
        Response::create([
            'question_id' => $this->question->id,
            'parent_response_id' => $this->response->id,
            'response' => $this->reply,
            'name' => $this->name,
            'email' => $this->email,
            'pseudo' => $this->pseudo
        ]);

        session()->flash('message', 'Saved');
        $this->reply = '';
        $this->name = '';
        $this->email = '';
        $this->pseudo = '';
    }
    
}
