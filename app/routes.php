<?php

App::missing(function($exception)
{
    return Redirect::action('PublicPagesController@view404Error');
});

//route for misc testing
Route::get('test', function()
{
    $array =[
        'companyName' => [
            'info' => [
                'roleTitle' => 'Title of the role',
                'group1' => 'Title of group1',
                'group2' => 'Title of group2',
                'group1EngagementTitle' => 'This will be a title for engagement content for group 1',
                'group2EngagementTitle' => 'This will be a title for engagement content for group 2',
                'group1DemoDescription' => 'This will be a description of the demo content for group 1',
                'group2DemoDescription' => 'This will be a description of the demo content for group 2',
                'group1ConversionDescription' => 'This will be a description of the conversion content for group1',
                'group2ConversionDescription' => 'This will b ea description of the conversion content for group2'
            ]
        ]
    ];

    return $array['companyName']['info']['roleTitle'];




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
    Route::get('/am-i-a-good-fit', 'PublicPagesController@viewEmploymentDemonstrationContent');
    Route::get('/1/lets-work-together', 'PublicPagesController@viewEmploymentConversionContent');
    Route::get('/1/thank-you', 'PublicPagesController@viewEmploymentConfirmationContent');

    //channel 2 routes
    Route::get('/what-i-bring', 'PublicPagesController@viewEmploymentDemonstrationContent');
    Route::get('/2/lets-work-together', 'PublicPagesController@viewEmploymentConversionContent');
    Route::get('/2/thank-you', 'PublicPagesController@viewEmploymentConfirmationContent');

    //dynamic re-engagement routes
    Route::get('/5-things-i-can-bring-to-the-{companyName}-team', 'PublicPagesController@viewDynamicReEngagementForMeeting');
    Route::get('/3-reasons-{contactName}-would-be-making-a-good-decision-adding-me-to-the-{companyName}-team', 'PublicPagesController@viewDynamicReEngagementForOffer');

    //dynamic acquisition presentation
    Route::get('/stepping-into-the-{roleTitle}-role-at-{companyName}', 'PublicPagesController@viewDynamicAcquisitionPresentation');

    //NON dynamic software presentation
    Route::get('/taking-on-the-project-management-role-at-Zivtech', 'PublicPagesController@viewZivtech');
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
    Route::get('/body-of-work', 'PublicPagesController@viewBodyOfWork');
    Route::get('/your-lost', 'PublicPagesController@view404Error');

});


//routes for angularjs/ajax calls
Route::group(array('prefix' => 'api.v1'),function()
{
    Route::get('/skills', 'PublicPagesController@getDataSkills');
    Route::post('/connect', 'PublicPagesController@postDataConnect');
    Route::get('/acquisitionData/{companyName}', 'PublicPagesController@getDataAcquisition');
});




Route::get('/forget', function()
{
    Cache::forget('getDataHome');
    Cache::forget('getDataSkills');
    Cache::forget('getDataExperiences');
});


