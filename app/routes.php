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

//    $trait = new \App\Polymorphic\TraitConcrete();
//    $file = $trait->createMockUploadedImage('png', 'someName', 'uploads/testing');
////    dd(explode('/public/', $file->getPathName()));
////    dd(public_path());
//
//    dd($file->getClientOriginalName());

});
