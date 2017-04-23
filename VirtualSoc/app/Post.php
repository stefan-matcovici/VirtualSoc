<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

     protected $fillable = ['content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany('app\User', 'likes', 'post_id', 'user_id');
    }

    public function like($userId)
    {
        $this->likes()->attach($userId); 
    }

    public function dislikes()
    {
        return $this->belongsToMany('app\User', 'dislikes', 'post_id', 'user_id');
    }

    public function dislike($userId)
    {
        $this->dislikes()->attach($userId); 
    }
}
