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

//routes for employment acquisition channels
Route::group(array('prefix' => 'recruitment'), function()
{
    //engagement content
    Route::get('/engagement/11-traits-to-look-for-in-your-next-marketing-hire', 'PublicPagesController@viewEmploymentEngagementContent');

    //channel 1 routes
    Route::get('/am-i-a-good-fit', 'PublicPagesController@viewEmploymentDemonstrationContent1');
    Route::get('/1/lets-work-together', 'PublicPagesController@viewEmploymentConversionContent');
    Route::get('/1/lets-work-together-now', 'PublicPagesController@viewEmploymentTOConversionContent');
    Route::get('/1/thank-you', 'PublicPagesController@viewEmploymentConfirmationContent');

    //channel 2 routes
    Route::get('/what-can-i-bring', 'PublicPagesController@viewEmploymentDemonstrationContent2');
    Route::get('/2/lets-work-together', 'PublicPagesController@viewEmploymentConversionContent');
    Route::get('/2/lets-work-together-now', 'PublicPagesController@viewEmploymentTOConversionContent');
    Route::get('/2/thank-you', 'PublicPagesController@viewEmploymentConfirmationContent');

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


