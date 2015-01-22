<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/22/15
 * Time: 12:23 PM
 */

use Faker\Factory as Faker;
class ExperienceTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {
        \Illuminate\Support\Facades\DB::table('experiences')->truncate();

        $faker = Faker::create();
        foreach(range(1, 15) as $index)
        {

            \App\DomainLogic\ExperienceDirectory\Experience::create([
                'name' => $faker->word,
                'url' => $faker->url,
                'highlights' => $faker->text(),
                'rolesResponsibilities' => $faker->text(),
                'interview' => $faker->text(),

            ]);
        }
    }

}