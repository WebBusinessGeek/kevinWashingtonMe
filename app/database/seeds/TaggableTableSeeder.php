<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/22/15
 * Time: 1:51 PM
 */

class TaggableTableSeeder extends \Illuminate\Database\Seeder {


//    protected $tagIds =[
//        1,2,3,4,5,6,7,8,9,10,
//        11,12,13,14,15,16,17,18,19,20,
//        21,22,23,24,25,26,27,28,29,30,
//        31,32,33,34,35
//    ];
//
    protected $tagSkillRelationships= [

        1 => [1,2,3,32,33,42,46,47,62,81,97],

        2 => [13,14,15,16,17,18,19,20,21,22,23,24,25],

        3 => [24,25,26,29,82],

        4 => [13,14,15,16,17,18,19,20,21,22,23,24,25],

        5 => [13,14,15,16,17,18,19,20,21,22,23,24,25],

        6 => [13,14,15,16,17,18,19,20,21,22,23,24,25],

        7 => [6,7,8,9,11,12,23,28,35,36,48,58,83,96,106],

        8 => [13,14,15,16,17,18,19,20,21,22,23,24,25],

        9 => [1,2,3,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58],

        10 => [42,43,44,45,46,47],

        11 => [42,43,44,45,46,47],

        12 => [27,28,29,30,31],

        13 => [24,25,26,29,70,71,72,73,74,75,76,77,79,80,81,82,83,88],

        14 => [32,33,34,35],

        15 => [1,2,3,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58],

        16 => [1,2,3,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58],

        17 => [36,37,38,39,40,41],

        18 => [48,49,50]

    ];
//
//    public function run()
//    {
//        \Illuminate\Support\Facades\DB::table('taggables')->truncate();
//
//
//        foreach($this->tagIds as $tagId)
//        {
//            $tag = \App\DomainLogic\TagDirectory\Tag::find($tagId);
//
//            foreach($this->tagSkillRelationships[$tagId] as $skillId)
//            {
//                $tag->skills()->attach($skillId);
//            }
//        }
//
//
//    }

//    public function run()
//    {
//        \Illuminate\Support\Facades\DB::table('taggables')->truncate();
//
//
//        foreach(range(1,15) as $index)
//        {
//            $skill = \App\DomainLogic\SkillDirectory\Skill::find($index);
//
//            foreach(range(1, 4) as $index2)
//            {
//                $skill->tags()->attach(rand(1,15));
//            }
//        }
//
//
//    }
}