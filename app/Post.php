<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'title', 'story', 'active', 'user_id'
  ];
  protected $hidden = ['user_id'];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
