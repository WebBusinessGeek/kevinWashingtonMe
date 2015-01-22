<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/22/15
 * Time: 12:31 PM
 */

use Faker\Factory as Faker;
class InquiryTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {
        \Illuminate\Support\Facades\DB::table('inquiries')->truncate();

        $faker = Faker::create();
        $contactMethods = ['email', 'phone', 'skype'];
        foreach(range(1, 15) as $index)
        {

            \App\DomainLogic\InquiryDirectory\Inquiry::create([
                'name' => $faker->name,
                'body' => $faker->text(),
                'contactMethod' => $contactMethods[rand(0, 2)],
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,

            ]);
        }
    }

}