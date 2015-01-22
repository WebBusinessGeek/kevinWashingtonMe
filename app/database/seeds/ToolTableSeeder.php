<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/22/15
 * Time: 12:21 PM
 */

use Faker\Factory as Faker;
class ToolTableSeeder  extends \Illuminate\Database\Seeder {

    public function run()
    {
        \Illuminate\Support\Facades\DB::table('tools')->truncate();

        $faker = Faker::create();
        foreach(range(1, 15) as $index)
        {

            \App\DomainLogic\ToolDirectory\Tool::create([
                'title' => $faker->word(),

            ]);
        }
    }

}