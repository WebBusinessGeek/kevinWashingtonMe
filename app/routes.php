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


//    $service = new \App\Base\ConcreteInternalServiceTestLibrary();
//
//
//   $response =  $service->returnUpdateResponseWithGoodIdAndGoodAttributesBeforeAndAfterUpdate();
//      dd($response);

//    dd(md5(rand(1209382, 102938102938109238)));

});