<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'response_id',
        'likes',
        'dislikes',
        'user_ip'
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function response(){
        return $this->belongsTo(Response::class);
    }
}
