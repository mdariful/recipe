<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Ingredient;
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
        $recipe = Recipe::orderBy('id', 'DESC')->paginate(5);

    return view('recipe.index',compact('recipe'));
        
        
    }
    
    
	/**
	 * Return a view to display search results for a given query
	 */
	 
	
	public function search(Request $request) {
		$searchString = trim(strip_tags($request->get('ingrediente')));

        $recipe = Recipe::whereHas('ingredients', function ($query) use ($searchString)
        {
             $query->where('name', 'like', '%'.$searchString.'%');
        })->get();
		return view('recipe.search',compact('recipe'));
	}
}