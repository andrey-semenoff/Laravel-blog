<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
  protected $fillable = ['text', 'user_id', 'commentable_id', 'commentable_type'];

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function commentable() {
    return $this->morphTo();
  }

  public function comments() {
    return $this->morphMany('App\Comment', 'commentable')->leftJoin('users', 'comments.user_id', '=', 'users.id')->orderBy('created_at', 'desc')->select('users.name as author', 'comments.*');
  }
}
