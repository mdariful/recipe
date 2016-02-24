<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use Auth;
use App\User;
use App\Ingredient;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;

class IngredientController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * store function
     */
     
    public function create()
    {
        $ingredient = Ingredient::orderBy('id', 'DESC')->paginate(5);
        return view('ingredient.create',compact('ingredient'));
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
    $ingredient = Ingredient::create($request->all());
    Session()->flash('flash_message', 'Ingrediente Aggiunto');
    return redirect()->back();
    }
    
    public function edit(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredient.edit',compact('ingredient'));
        
    }
    
    public function update(Request $request, $id)
    {
     
        $ingredient = Ingredient::findOrFail($id);

        $this->validate($request, [
        'name' => 'required'
    ]);
        //dd($request->all());
       
        $input = $request->all();
        
        $ingredient->update($input);
       
        Session()->flash('flash_message', 'Aggiornato correttamente');
        return redirect()->back();
    }
    
    
    public function destroy(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        Session()->flash('flash_message', 'Cancellato');
        return redirect()->route('ingredient.create');
        
    }
}
