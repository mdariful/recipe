<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $guarded = [];
    
     public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
