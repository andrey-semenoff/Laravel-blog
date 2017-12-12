<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
  protected $fillable = [
    'title',
    'body'
  ];

  public function comments() {
    return $this->morphMany('App\Comment', 'commentable')->leftJoin('users', 'comments.user_id', '=', 'users.id')->orderBy('created_at', 'desc')->select('users.name as author', 'comments.*');
  }
}
