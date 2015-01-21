<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/21/15
 * Time: 5:26 PM
 */

use Faker\Factory as Faker;

class SkillTableSeeder extends \Illuminate\Database\Seeder {


    public function run()
    {
        \Illuminate\Support\Facades\DB::table('skills')->truncate();

        $faker = Faker::create();
        foreach(range(1, 15) as $index)
        {

            \App\DomainLogic\SkillDirectory\Skill::create([
                'title' => $faker->word(),
                'category_id' => rand(1, 15),
                'article' => $faker->sentence(),
                'definition' => $faker->sentence(),
            ]);
        }
    }
}