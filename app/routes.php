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
//    $subjectModel = \App\DomainLogic\SkillDirectory\Skill::create(
//        [
//            'title' => 'skill',
//        ]
//    );
//
////    dd($subjectModel->id);
//
//    $tools = [];
//    foreach(range(1,10) as $index)
//    {
//        $tool = \App\DomainLogic\ToolDirectory\Tool::create([
//            'title' => 'tool'.$index,
//        ]);
//
//        $subjectModel->tools()->attach($tool->id);
//        array_push($tools, $tool);
//    }
//
//    $skillFromDB = \App\DomainLogic\SkillDirectory\Skill::find($subjectModel->id);
//
////    foreach($skillFromDB->tools as $tool)
////    {
////        echo $tool->title.'<br/>';
////    }
//
////    dd(count($skillFromDB->tools));
//
//    $newTool = \App\DomainLogic\ToolDirectory\Tool::create(['title'=>'lastTool']);
//
//    $skillFromDB->tools()->attach($newTool->id);
//    foreach($skillFromDB->tools as $tool)
//    {
//        echo $tool->title.'<br/>';


});