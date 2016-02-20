<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    protected $table = 'recipes';
    protected $fillable = [
        'name', 'description', 'difficult','category'
    ];
    
     public function user()
    {
        return $this->belongsTo('App\User');
    }
     public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient')->withTimestamps();
    }
    
    /**
     * get a list of all ingredients associeted with a recipe
     * /
     */
     
    public function getIngredientListAttribute()
    {
        //$recipe->ingredients
        return $this->ingredients->lists('id')->all();
        
    }
}
