<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    
    protected $fillable = [
        'name', 'description', 'difficult','category'
    ];
    
     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
