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
////
//    $imageService = new \App\DomainLogic\ImageDirectory\ImageInternalService();
//
//    $attr = [
//        'name' => 'someName',
//        'image' => $imageService->createMockUploadedImage('png', 'someName', 'uploads/testing'),
//        ];
//
//    $newImageObject = $imageService->store($attr);
//
//    dd($newImageObject->getDestroyableAttributes());





});
