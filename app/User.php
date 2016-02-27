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
  
  /**
   * check the user role if author or admin can post either can't post need approvation by admin
   * 
   */
   
  public function can_post()
  {
    $role = $this->role;
    if($role == 'author' || $role == 'admin')
    {
      return true;
    }
    return false;
  }
  /**
   * check if the user is admin
   * 
   */
   
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
