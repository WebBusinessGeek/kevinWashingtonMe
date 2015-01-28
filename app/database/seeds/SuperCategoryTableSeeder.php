<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/21/15
 * Time: 5:24 PM
 */
use Faker\Factory as Faker;

class SuperCategoryTableSeeder extends \Illuminate\Database\Seeder {

    protected $supercategoryTitles = [
        'Product','Traffic','Customer Acquisition','Management','Foundational'
    ];

    public function run()
    {
        \Illuminate\Support\Facades\DB::table('superCategories')->truncate();

        foreach($this->supercategoryTitles as $title)
        {

            \App\DomainLogic\SuperCategoryDirectory\SuperCategory::create([
                'title' => $title,
            ]);
        }
    }
}