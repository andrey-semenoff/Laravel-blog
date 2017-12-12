<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //

  protected $fillable = [
    'user_id', 'type', 'likable_id', 'likable_type'
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function likable() {
    return $this->morphMany();
  }
}
