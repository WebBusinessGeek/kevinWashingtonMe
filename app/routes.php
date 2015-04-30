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
    $multiArray= [
        1 => [1,3,5],
        2 => [2,4,6],
        3 => [8,9,10],
    ];

    foreach($multiArray as $key => $value)
    {
        echo $key;
    }
});


Route::get('testemail', function()
{
    Mail::send('emails.test', [], function($message)
    {
        $message->to('kevw12188@gmail.com')->subject('test email');
    });
});

//public pages for seo site
Route::group(array('domain' => 'seo.' . getenv('DOMAIN_NAME')), function()
{
    Route::get('/', 'SeoPagesController@viewMain');
    Route::get('/some-title1', 'SeoPagesController@viewAddValue1');
    Route::get('/some-title2', 'SeoPagesController@viewAddValue2');
    Route::get('/some-title3', 'SeoPagesController@viewAddValue3');
    Route::get('/my-seo-process', 'SeoPagesController@viewDemo');
    Route::get('/connect', 'SeoPagesController@viewConnect');
    Route::get('/connect/lets-work-together', 'SeoPagesController@viewCTA');
    Route::get('/connect/lets-work-together-now', 'SeoPagesController@viewCTATO');
    Route::get('/thank-you', 'SeoPagesController@viewConversionConfirm');
});


//public pages for main site
Route::group(array(),function()
{
    Route::get('/', 'PublicPagesController@viewHome');
    Route::get('/intro', 'PublicPagesController@viewIntro');
    Route::get('/tmi', 'PublicPagesController@viewTMI');
    Route::get('/skills', 'PublicPagesController@viewSkills');
    Route::get('/connect', 'PublicPagesController@viewConnect');
    Route::get('/karma-crm-stats', 'PublicPagesController@viewKarmaCRMStats');
    Route::get('/resume', 'PublicPagesController@viewResume');
    Route::get('/your-lost', 'PublicPagesController@view404Error');

});



//routes for angularjs/ajax calls
Route::group(array('prefix' => 'api.v1'),function()
{
    Route::get('/skills', 'PublicPagesController@getDataSkills');
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


