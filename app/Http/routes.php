<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::group(['middleware' => ['web']], function () {

    Route::get('/search', array('as' => 'recipe.search', 'uses' => 'RecipeViewController@search'));
});

Route::group(['middleware' => ['web']], function () {
    //
    Route::get('/recipe', array('as' => 'recipe.index', 'uses' => 'RecipeViewController@index'));

    Route::get('/recipe/create', array('as' => 'recipe.create', 'uses' => 'RecipeController@create'));
    Route::post('/recipe', array('as' => 'recipe.store', 'uses' => 'RecipeController@store'));

    Route::get('/recipe/{id}', array('as' => 'recipe.show', 'uses' => 'RecipeShowController@show'));

    Route::get('/recipe/{id}/edit', array('as' => 'recipe.edit', 'uses' => 'RecipeController@edit'));
    Route::put('/recipe/{id}', array('as' => 'recipe.update', 'uses' => 'RecipeController@update'));
    
    Route::delete('/recipe/{id}', array('as' => 'recipe.destroy', 'uses' => 'RecipeController@destroy'));
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
