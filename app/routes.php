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
////trait instance
//    $trait = new \App\Polymorphic\TraitConcrete();
//
//    //good mock uploaded image to resize and store its size
//    $imageFile = $trait->createMockUploadedImage('png', 'resizeAndStoreImageMethodTest', 'uploads/testing');
//    $originalSize = getimagesize($imageFile->getPathName());
//    $originalWidth = $originalSize[0];
//    $originalHeight = $originalSize[1];
//
//    //new width and height values
//    $newWidth = 500;
//    $newHeight = 600;
//
//    //bad mock uploaded file
//    $textFile = $trait->createMockUploadedTextFile('resizeAndStoreImageMethodTest', 'uploads/testing','text from test');
//
//    //call resizeAndStoreImage method on good image
//    //CHANGE DIRECTORY OR TEST WILL FAIL DUE TO OVERWRITING ORIGINAL IMAGE!!
//    $goodResponse = $trait->resizeAndStoreImage($imageFile, $newWidth, $newHeight, 'uploads/large');
//

//   dd($imageFile->getPathName());
//    dd($goodResponse['fullPath']);
//    dd($textFile->getPathName());
});
