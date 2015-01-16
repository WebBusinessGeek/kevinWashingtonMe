<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return View::make('hello');



});

Route::get('/login', function()
{
 return 'login page';
});


Route::group(array('before' => 'auth'), function ()
{

    Route::get('dashboard/supercategory', 'SuperCategoryController@index');
    Route::get('dashboard/supercategory/create', 'SuperCategoryController@create');
    Route::get('dashboard/supercategory/{id}', 'SuperCategoryController@show');
    Route::get('dashboard/supercategory/{id}/edit', 'SuperCategoryController@edit');
    Route::post('dashboard/supercategory', 'SuperCategoryController@store');

});


Route::get('testing/supercategory', 'SuperCategoryController@store');


