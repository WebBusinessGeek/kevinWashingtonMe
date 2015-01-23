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

//route for misc testing
Route::get('test', function()
{
    return \Illuminate\Support\Facades\Cache::get('getDataExperiences');
});



//public pages
Route::group(array(),function()
{
    Route::get('/', 'PublicPagesController@viewHome');
    Route::get('/skills', 'PublicPagesController@viewSkills');
    Route::get('/experiences', 'PublicPagesController@viewExperiences');
    Route::get('/connect', 'PublicPagesController@viewConnect');
});

//routes for angularjs/ajax calls
Route::group(array('prefix' => 'api.v1'),function()
{
    Route::get('/', 'PublicPagesController@getDataHome');
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




