<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'username','active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','active'
    ];
    public function posts()
    {
      return $this->hasMany(Post::class);
    }
    public function roles()
    {
      return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }
    public function hasRole($role)
    {
        foreach ($this->roles as $role_t){
            if ($role_t->id == $role){
                return true;
            }
        }
        return false;
  }
}
