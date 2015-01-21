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


Route::get('/login', function()
{
 return 'login page';


});


Route::group(array('before' => 'auth', 'prefix' => 'dashboard'), function ()
{
    Route::resource('supercategory', 'SuperCategoryController');
    Route::resource('tool', 'ToolController');
    Route::resource('tag', 'TagController');
    Route::resource('category', 'CategoryController');
    Route::resource('skill', 'SkillController');
    Route::resource('experience', 'ExperienceController');
    Route::resource('inquiry', 'InquiryController');
    Route::resource('image', 'ImageController');
});


Route::group(array(),function()
{
    Route::get('/', 'PublicPagesController@home');
    Route::get('/skills', 'PublicPagesController@skills');
    Route::get('/experiences', 'PublicPagesController@experiences');
    Route::get('/connect', 'PublicPagesController@connect');
    Route::post('/connect', 'PublicPagesController@inquiryCreate');
});


Route::get('testing/supercategory', 'SuperCategoryController@store');

Route::resource('testing', 'SuperCategoryController');