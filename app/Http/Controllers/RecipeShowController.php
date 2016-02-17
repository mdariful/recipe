<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RecipeShowController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $recipe = Recipe::findOrFail($id);

    return view('recipe.show')->withRecipe($recipe);
    }
}