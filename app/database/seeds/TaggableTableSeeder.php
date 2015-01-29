<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/22/15
 * Time: 1:51 PM
 */

class TaggableTableSeeder extends \Illuminate\Database\Seeder {

   //for each tag - attach its skills

//    protected $tagIds =[
//        1,2,3,4,5,6,7,8,9,10,
//        11,12,13,14,15,16,17,18,19,20,
//        21,22,23,24,25,26,27,28,29,30,
//        31,32,33,34,35
//    ];
//
//    protected $tagSkillRelationships= [
//
//    ];
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

    public function run()
    {
        \Illuminate\Support\Facades\DB::table('taggables')->truncate();


        foreach(range(1,15) as $index)
        {
            $skill = \App\DomainLogic\SkillDirectory\Skill::find($index);

            foreach(range(1, 4) as $index2)
            {
                $skill->tags()->attach(rand(1,15));
            }
        }


    }
}