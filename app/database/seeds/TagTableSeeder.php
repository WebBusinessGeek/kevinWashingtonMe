<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/21/15
 * Time: 4:57 PM
 */

use Faker\Factory as Faker;
class TagTableSeeder  extends \Illuminate\Database\Seeder{

    public function run()
    {
        \Illuminate\Support\Facades\DB::table('tags')->truncate();

        $faker = Faker::create();
        foreach(range(1, 15) as $index)
        {

            \App\DomainLogic\TagDirectory\Tag::create([
                'title' => 'Tag'.$faker->word(),
            ]);
        }
    }
}