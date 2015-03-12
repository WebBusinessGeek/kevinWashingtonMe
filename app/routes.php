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

App::missing(function($exception)
{
    return Redirect::action('PublicPagesController@view404Error');
});

//route for misc testing
Route::get('test', function()
{

});



//public pages
Route::group(array(),function()
{
    Route::get('/', 'PublicPagesController@viewHome');
    Route::get('/skills', 'PublicPagesController@viewSkills');
    Route::get('/experiences', 'PublicPagesController@viewExperiences');
    Route::get('/connect', 'PublicPagesController@viewConnect');
    Route::get('/services', 'PublicPagesController@viewServices');
    Route::get('/karma-crm-stats', 'PublicPagesController@viewKarmaCRMStats');
    Route::get('/your-lost', 'PublicPagesController@view404Error');

});


//routes for angularjs/ajax calls
Route::group(array('prefix' => 'api.v1'),function()
{
    Route::get('/skills', 'PublicPagesController@getDataSkills');
    Route::get('/experiences', 'PublicPagesController@getDataExperiences');
    Route::post('/connect', 'PublicPagesController@postDataConnect');
});

//auth related routes
Route::group(array(), function()
{
    Route::get('/login', function()
    {
        return 'login page';
    });
});

//private dashboard routes
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



Route::get('/forget', function()
{
    Cache::forget('getDataHome');
    Cache::forget('getDataSkills');
    Cache::forget('getDataExperiences');
});


