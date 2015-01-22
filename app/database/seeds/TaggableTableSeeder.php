<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/22/15
 * Time: 1:51 PM
 */

class TaggableTableSeeder extends \Illuminate\Database\Seeder {


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