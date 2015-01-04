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


//
//    $tagService = new \App\DomainLogic\TagDirectory\TagInternalService();
//
//    $good = [
//        'title' => 'someTitle'
//    ];
//    $response = $tagService->modelAcceptsAttributes($good, $tagService->getModelAttributes());
//
//
//
//    $tag = new \App\DomainLogic\TagDirectory\Tag();
//    $image = new \App\DomainLogic\ImageDirectory\Image();
//    $imageService = new \App\DomainLogic\ImageDirectory\ImageInternalService();
//
//    dd($imageService->getModelAttributes());
});
