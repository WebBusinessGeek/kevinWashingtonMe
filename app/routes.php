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
//    foreach(range(1,15) as $index)
//    {
//        \App\DomainLogic\TagDirectory\Tag::create([
//            'title' => 'tag'.$index,
//        ]);
//    }
//
//    $tagService = new \App\DomainLogic\TagDirectory\TagInternalService();
//    dd($tagService->index(6));
});
