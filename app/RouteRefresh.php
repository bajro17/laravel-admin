<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RouteRefresh extends Model
{
  protected $fillable = [
    'name', 'description',
];
  protected $table = 'route_refresh';
  public function roles()
  {
    return $this->belongsToMany(Role::class);
  }
}
