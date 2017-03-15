<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
      'name', 'description',
  ];
  public function users()
  {
      return $this->belongsToMany('App\User');
  }
<<<<<<< HEAD
  public function links()
  {
    return $this->belongsToMany('App\Link', 'link_role', 'role_id', 'link_id');
  }
  public function hasLink($link)
  {
      foreach ($this->links as $link_t){
          if ($link_t->id == $link){
              return true;
          }
      }
      return false;
=======
  public function routes()
  {
    return $this->belongsToMany(RouteRefresh::class);
>>>>>>> 9a8e0e200c383d164397de7277bc19bba21d0707
  }
}
