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
    //
    Route::get('/search', array('as' => 'recipe.search', 'uses' => 'RecipeViewController@search'));
    Route::get('/recipe', array('as' => 'recipe.index', 'uses' => 'RecipeViewController@index'));
    Route::get('/recipe/create', array('as' => 'recipe.create', 'uses' => 'RecipeController@create'));
    Route::post('/recipe', array('as' => 'recipe.store', 'uses' => 'RecipeController@store'));
    Route::get('/recipe/{id}', array('as' => 'recipe.show', 'uses' => 'RecipeShowController@show'));
    Route::get('/recipe/{id}/edit', array('as' => 'recipe.edit', 'uses' => 'RecipeController@edit'));
    Route::put('/recipe/{id}', array('as' => 'recipe.update', 'uses' => 'RecipeController@update'));

    Route::delete('/recipe/{id}', array('as' => 'recipe.destroy', 'uses' => 'RecipeController@destroy'));
});

Route::group(['middleware' => ['web','auth']], function () {
    /**
     *
     * admin routing for manipulating users
     *
     */
    //Dashboard
    Route::get('/admin', array('as' => 'admin.index', 'uses' => 'AdminController@index'));

    //show all user
    Route::get('/admin/user', array('as' => 'admin.user', 'uses' => 'AdminController@user'));
    Route::get('/admin/ingredient', array('as' => 'admin.ingredient', 'uses' => 'AdminController@ingredient'));
    Route::delete('/admin/ingredient/{id}', array('as' => 'ingredient.destroy', 'uses' => 'AdminController@ingdestroy'));
    Route::get('/admin/recipe', array('as' => 'admin.recipe', 'uses' => 'AdminController@recipe'));
    Route::delete('/admin/recipe/{id}', array('as' => 'rec.destroy', 'uses' => 'AdminController@recdestroy'));

    //Create user
    Route::get('/admin/create', array('as' => 'admin.create', 'uses' => 'AdminController@create'));
    Route::post('/admin', array('as' => 'admin.store', 'uses' => 'AdminController@store'));

    //show single user
    Route::get('/admin/{id}', array('as' => 'admin.show', 'uses' => 'AdminController@show'));

    //edit user
    Route::get('/admin/{id}/edit', array('as'=>'admin.edit','uses'=>'AdminController@edit'));
    Route::put('/admin/{id}', array('as'=>'admin.update','uses'=>'AdminController@update'));

    //delete user
    Route::delete('/admin/{id}/delete', array('as'=>'admin.destroy','uses'=>'AdminController@destroy'));

});


Route::group(['middleware' => 'web'], function () {
    Route::auth();

    //When user authenticate
    Route::get('/home', 'HomeController@index');

});
