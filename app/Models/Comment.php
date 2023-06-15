<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function rnews(){
        return $this->belongsTo(Post::class,'news_id','id');
    }


    public function ruser(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
