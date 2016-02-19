<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use Auth;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('recipe.create');
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
        'description' => 'required',
        'difficult' => 'required',
        'category' => 'required'
    ]);
    //$input = $request->all();
     //Recipe::create($input);
     $input = new Recipe($request->all());
    Auth::user()->recipe()->save($input);
    Session()->flash('flash_message', 'Ricetta aggiunta con successo!');
    return redirect()->back();
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
        $recipe = Recipe::findOrFail($id);
        if($recipe && ($request->user()->id == $recipe->user_id || $request->user()->is_admin())){
        return view('recipe.edit')->withRecipe($recipe);
        }
        return redirect('/recipe')->withErrors('you have not sufficient permissions');

    //return view('recipe.edit')->withRecipe($recipe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);

        $this->validate($request, [
        'name' => 'required',
        'description' => 'required',
        'difficult' => 'required',
        'category' => 'required'
    ]);

        $input = $request->all();
        if($recipe && ($request->user()->id == $recipe->user_id || $request->user()->is_admin()))
        {
        $recipe->fill($input)->save();
    
        Session()->flash('flash_message', 'Aggiornato correttamente');
    
        return redirect()->back();
    }else
        {
          return redirect('/home')->withErrors('you have not sufficient permissions');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
    if($recipe && ($request->user()->id == $recipe->user_id || $request->user()->is_admin()))
    {
        $recipe->delete();
    
        Session()->flash('flash_message', 'Cancellato');
    
        return redirect()->route('recipe.index');
    }else 
    {
        Session()->flash('flash_message', 'Non hai i permessi');
    }
    }
    
}