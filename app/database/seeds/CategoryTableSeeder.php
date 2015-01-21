<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/21/15
 * Time: 5:29 PM
 */

use Faker\Factory as Faker;
class CategoryTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {
        \Illuminate\Support\Facades\DB::table('categories')->truncate();

        $faker = Faker::create();
        foreach(range(1, 15) as $index)
        {

           \App\DomainLogic\CategoryDirectory\Category::create([
                'title' => $faker->word(),
               'superCategory_id' => rand(1, 15),
            ]);
        }
    }

}