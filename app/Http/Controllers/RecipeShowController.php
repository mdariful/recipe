<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\User;
use App\Ingredient;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RecipeShowController extends Controller
{
    
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $recipe = Recipe::find($id);
    return view('recipe.show', compact('recipe'));
    
    }
}