<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
      public function recipe()
    {
        return $this->hasMany('App\Recipe');
    }
  public function can_post()
  {
    $role = $this->role;
    if($role == 'author' || $role == 'admin')
    {
      return true;
    }
    return false;
  }
  public function is_admin()
  {
    $role = $this->role;
    if($role == 'admin')
    {
      return true;
    }
    return false;
  }
}
