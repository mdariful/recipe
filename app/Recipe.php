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

    /**
     * user relation
     */

     public function user()
    {
        return $this->belongsTo('App\User');
    }

     /**
      * ingredient relation
      */

     public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient')->withTimestamps();
    }

    /**
     * get a list of all ingredients associeted with a recipe
     *
     */

    public function getIngredientListAttribute()
    {

        return $this->ingredients->lists('id')->all();

    }
}
