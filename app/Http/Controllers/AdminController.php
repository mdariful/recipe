<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ingredient;
use App\Recipe;
use Illuminate\Support\Facades\Input as input;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
     public function __construct()
    {
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $recipe = Recipe::count();
        $ingredient = Ingredient::count();
        $user = User::count();
        return view('admin.index', compact('recipe','ingredient','user'));
    }
    
    public function ingredient()
    {
        $ingredient = Ingredient::orderBy('id', 'DESC')->paginate(5);
        return view('admin.ingredient',compact('ingredient'));
    }
    
    public function ingdestroy(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        Session()->flash('flash_message_delete', 'Cancellato');
        return redirect()->back();
        
    }
    
    public function recipe()
    {
         $recipe = Recipe::orderBy('id', 'DESC')->paginate(5);
        return view('admin.recipe',compact('recipe'));
    }
    
    public function recdestroy(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        Session()->flash('flash_message_delete', 'Cancellato');
        return redirect()->back();
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        $user = User::orderBy('id', 'DESC')->paginate(5);
        return view('admin.user',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'role' => 'required'
    ]);
    $user = new User;
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make(Input::get('password'));
    $user->role = $request->input('role');
    $user->save();
    Session()->flash('flash_message', 'Utente aggiunto con successo!');
    return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        return view('admin.edit', compact('user'));
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
        $user = User::findOrFail($id);

        $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        
        'role' => 'required'
    ]);
        $user->name = $request->input('name');
    $user->email = $request->input('email');
    //$user->password = Hash::make(Input::get('password'));
    $user->role = $request->input('role');
    $user->update();
        //dd($request->all());
        //$user->update($input);
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
        $user = User::findOrFail($id);
        $user->delete();
        Session()->flash('flash_message_delete', 'Cancellato');
        return redirect()->route('admin.user');
    }
}
