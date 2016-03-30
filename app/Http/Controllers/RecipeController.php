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
use Illuminate\Support\Facades\Validator;

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
    public function create(Request $request)
    {
        if($request->user()->can_post()){
        $ingredients = Ingredient::lists('name', 'id');
        return view('recipe.create', compact('ingredients'));
    }else{
        Session()->flash('flash_message_warning', 'Non hai i permessi!');
        return redirect()->route('recipe.index');
    }

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
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'description' => 'required',
        'difficult' => 'required',
        'category' => 'required',
        'image' => 'required|mimes:jpeg',
    ]);

    /**
     * http://laravel.io/forum/04-22-2015-select2-dynamic-select-addcslashes
     *
     */

    if ($validator->fails()) {
    Session()->flash('flash_message_warning', 'Correggi gli errori!');
    return redirect()->back();

    }else{

         if ( ! $request->has('ingredient_list'))
   {
       $recipe->ingredients()->detach();
       return;
   }

    $ingredients = array();

       foreach ($request->ingredient_list as $ingId)
       {
           if (substr($ingId, 0, 4) == 'new:')
           {
               $newIng = Ingredient::create(['name' => substr($ingId, 4)]);
               $ingredients[] = $newIng->id;
               continue;
           }
           $ingredients[] = $ingId;
       }

     //dd($request->all());
     $recipe = Auth::user()->recipe()->create($request->all());

     $recipe->ingredients()->attach($ingredients);

     $file = $request->file('image');
     $ext = $file->getClientOriginalExtension();
     $imageName = $recipe->id . '.' . $ext;

    $file->move(base_path() . '/public/images/recipe/', $imageName);

    Session()->flash('flash_message', 'Ricetta aggiunta con successo!');
    return redirect()->back();


    }

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
        $ingredients = Ingredient::lists('name', 'id');
        /**
         * if the user authenticate can modify the recipe own
         */
        if($recipe && ($request->user()->id == $recipe->user_id || $request->user()->is_admin())){
        return view('recipe.edit',compact('ingredients','recipe'));
        }else{
        Session()->flash('flash_message_warning', 'Non hai i permessi!');
        return redirect()->route('recipe.index');
        }

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
        /**
         * if the user authenticate can modify the recipe own
         */
        $recipe->update($input);
        /**
         * syncronize list of ingredients with database and the recipe
         */




    if ( ! $request->has('ingredient_list'))
   {
       $recipe->ingredients()->detach();
       return;
   }

    $ingredients = array();
   foreach ($request->ingredient_list as $ingId)
   {
       if (substr($ingId, 0, 4) == 'new:')
       {
           $newIng = Ingredient::create(['name' => substr($ingId, 4)]);
           $ingredients[] = $newIng->id;
           continue;
       }
       $ingredients[] = $ingId;
   }
    //dd($request->all());

        $recipe->ingredients()->sync($ingredients);
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
        Session()->flash('flash_message_delete', 'Cancellato');
        return redirect()->route('recipe.index');
    }


}