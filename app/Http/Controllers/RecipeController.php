<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        'difficult' => 'required'
    ]);

    $input = $request->all();

     Recipe::create($input);

    Session()->flash('flash_message', 'Ricetta aggiunta con successo!');

    return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::findOrFail($id);

    return view('recipe.edit')->withRecipe($recipe);
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
        'difficult' => 'required'
    ]);

    $input = $request->all();

    $recipe->fill($input)->save();

    Session()->flash('flash_message', 'Aggiornato correttamente');

    return redirect()->back();
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

    $recipe->delete();

    Session()->flash('flash_message', 'Cancellato');

    return redirect()->route('recipe.index');
    }
}