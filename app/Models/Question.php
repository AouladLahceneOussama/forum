<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'question',
    ];

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
