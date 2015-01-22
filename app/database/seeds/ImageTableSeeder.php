<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/22/15
 * Time: 12:13 PM
 */
use Faker\Factory as Faker;
class ImageTableSeeder extends \Illuminate\Database\Seeder {


    public function run()
    {
        \Illuminate\Support\Facades\DB::table('images')->truncate();

        $faker = Faker::create();
        foreach(range(1, 15) as $index)
        {

            App\DomainLogic\ImageDirectory\Image::create([
                'name' => $faker->word,
                'originalPath' => $faker->word.'/'.$faker->word,
                'smallPath' => $faker->word.'/'.$faker->word,
                'mediumPath' => $faker->word.'/'.$faker->word,
                'largePath' => $faker->word.'/'.$faker->word,
                'originalLongPath' => public_path().'/'.$faker->word.'/'.$faker->word,
                'smallLongPath' => public_path().'/'.$faker->word.'/'.$faker->word,
                'mediumLongPath' => public_path().'/'.$faker->word.'/'.$faker->word,
                'largeLongPath' => public_path().'/'.$faker->word.'/'.$faker->word,
            ]);
        }
    }

}