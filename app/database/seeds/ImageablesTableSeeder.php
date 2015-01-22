<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/22/15
 * Time: 1:41 PM
 */


class ImageablesTableSeeder extends \Illuminate\Database\Seeder {


    public function run()
    {
        \Illuminate\Support\Facades\DB::table('imageables')->truncate();


        foreach(range(1,15) as $index)
        {
            $skill = \App\DomainLogic\SkillDirectory\Skill::find($index);
            $tool = \App\DomainLogic\ToolDirectory\Tool::find($index);
            $experience = \App\DomainLogic\ExperienceDirectory\Experience::find($index);

            $skill->images()->sync([rand(1, 15)]);
            $tool->images()->sync([rand(1, 15)]);
            $experience->images()->sync([rand(1, 15)]);
        }


    }
}