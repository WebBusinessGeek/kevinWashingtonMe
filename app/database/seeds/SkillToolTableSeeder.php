<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/22/15
 * Time: 1:31 PM
 */

use Faker\Factory as Faker;
class SkillToolTableSeeder extends \Illuminate\Database\Seeder {


    protected $skillToolKey = [

        1 => [2,4,65],
        2 => [1,2,17,13,16,66],
        3 => [1,2,3,17,36,37,38,44],
        4 => [6,7,8,58],
        5 => [6,1,2,8],
        6 => [6,1,7,8,58],
        7 => [10,1,2,4,3],
        8 => [2,1,4],
        9 => [2,4,5],
        10 => [2,4,5],
        11 => [2,4,5],
        12 => [1,2,3,4,11],
        13 => [7,8,18,19,20,21,22,23,24,25,26,27,28,29,60,61,63,67],
        14 => [59,67,18],
        15 => [7,8,18,19,20,21,22,23,24,25,26,27,28,29,60,61,63,67],
        16 => [70,69,68,59,18],
        17 => [7,8,18,19,20,21,22,23,24,25,26,27,28,29,60,61,63,67],
        18 => [59,67,18],
        19 => [59,67,68,69],
        20 => [59],
        
    ];


    public function run()
    {
        \Illuminate\Support\Facades\DB::table('skill_tool')->truncate();


        foreach(range(1, 15) as $index)
        {
            $skill = \App\DomainLogic\SkillDirectory\Skill::find($index);
            foreach(range(1, 4) as $index2)
            {
                $skill->tools()->attach(rand(1, 15));
            }
        }

    }
}