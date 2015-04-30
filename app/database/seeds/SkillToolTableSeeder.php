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
        21 => [59,18,8,7,4],
        22 => [8],
        23 => [4,29,60,28],
        24 => [32,33,31,30,53,48,1,2],
        25 => [32,33,31,30,53,48,1,2],
        26 => [32,33,31,30,53,48,1,2],
        27 => [4,1],
        28 => [1,6,11],
        29 => [31,30,34,35],
        30 => [40,35,34],
        31 => [4],
        32 => [3,1,2],
        33 => [64,37,36,38],
        34 => [1,2,4],
        35 => [1,2,4],
        36 => [1,2,4,11],
        37 => [1,2,4],
        38 => [1,2,4,12,13],
        39 => [40,41,42],
        40 => [40,41,42],
        41 => [50,56,57],
        42 => [3,36,37,38,43,44],
        43 => [45,4],
        44 => [46],
        45 => [3,36,37,38,44,43],
        46 => [3,36,37,38,43,44],
        47 => [12,13,54],
        48 => [11],
        49 => [40,41,42,4],
        50 => [40,41,42,4],
        51 => [51],
        52 => [1,2,51],
        53 => [1,2,51],
        54 => [41,42,4,39],
        55 => [51,41,42,4],
        56 => [9,52],
        57 => [56,57,50],
        58 => [6,52],
        59 => [1,6],
        60 => [1,6,53,49,48],
        61 => [71],
        62 => [71],
        63 => [71],
        64 => [71],
        65 => [71],
        66 => [71],
        67 => [2,41,42],
        68 => [2,41,42],
        69 => [2,4],
        70 => [12,13,14,15],
        71 => [1,4],
        72 => [1,4],
        73 => [31,30,32,33,4],
        74 => [31,30,4],
        75 => [4],
        76 => [54,48,53,30,31],
        77 => [4],
        78 => [4,1],
        79 => [41,42],
        80 => [4],
        81 => [4,41,42],
        82 => [30,31,2,4],
        83 => [1,4],
        84 => [55],
        85 => [4],
        86 => [4],
        87 => [4],
        88 => [1,2],
        89 => [4,41,42],
        90 => [4,41,42],
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