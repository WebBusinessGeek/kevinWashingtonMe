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
//    $arry = [
//        'test1' => 3,
//        'test2' => 4,
//        'test3' => null,
//        'test4' => 5,
//        'test5' => null,
//    ];
//
//    $results = [];
//    foreach(range(1,5) as $count)
//    {
//        if($arry['test'.$count] != null )
//        {
//            array_push($results, $arry['test'.$count]);
//        }
//    }
//
//    dd($results);
});