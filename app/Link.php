<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
  protected $fillable = [
    'name',
];
public function roles()
{
  return $this->belongsToMany('App\Role');
}
}
