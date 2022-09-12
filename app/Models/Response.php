<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'parent_response_id',
        'response',
        'pseudo',
        'name',
        'email',
        'validated'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likeInteraction($reply, $intereaction)
    {
        return Like::where([
            ['question_id', "=", $reply->question_id],
            ['response_id', "=", $reply->id],
            ["$intereaction", "=", 1]
        ])->get();
    }

    public function replies($reponse)
    {
        return Response::where([
            ['question_id', '=', $reponse->question_id],
            ['parent_response_id', '=', $reponse->id],
        ])->get();
    }

    public function validatedReplies($reponse)
    {
        return Response::where([
            ['question_id', '=', $reponse->question_id],
            ['parent_response_id', '=', $reponse->id],
            ['validated', '=', 1],
        ])->get();
    }
}
