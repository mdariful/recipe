<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RecipeViewController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$recipe = Recipe::orderBy('created_at')->paginate(10);
        //return view('recipe.index')->with('recipe', $recipe);
        return view('recipe.index');
        
    }
}