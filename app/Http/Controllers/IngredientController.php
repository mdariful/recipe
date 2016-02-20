<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Ingredient;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IngredientController extends Controller
{
    public function create()
    {
        
        return view('recipe.ingredient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    $this->validate($request, [
        'name' => 'required',
    ]);
   $recipe = create($request->all());
     
     
     //$input = new Recipe($request->all());
     //$ingredientsId = $request->input('ingredients');
    //Auth::user()->recipe()->save($input);
    Session()->flash('flash_message', 'Ingrediente Aggiunto');
    return redirect()->back();
    }
}
