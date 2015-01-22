<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/22/15
 * Time: 1:31 PM
 */

use Faker\Factory as Faker;
class SkillToolTableSeeder extends \Illuminate\Database\Seeder {


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