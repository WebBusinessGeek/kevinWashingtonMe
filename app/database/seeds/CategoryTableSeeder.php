<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/21/15
 * Time: 5:29 PM
 */

use Faker\Factory as Faker;
class CategoryTableSeeder extends \Illuminate\Database\Seeder {

    protected $supercategoryCount = [
        1,2,3,4,5
    ];
    protected $categoryTitleGroups = [

        1 => [
            'Research','Strategy & Planning','Construction'
        ],

        2 => [
            'Email Marketing','Link Building for Traffic','Content Marketing','Search Engine Optimization','Paid Advertising'
        ],

        3 => [
            'Visitor Behavior Optimization','Landing Page Marketing','Sales'
        ],

        4 => [
            'Revenue Growth', 'Team', 'Processes', 'Objectives'
        ],

        5 => [
            'Interpersonal','Data/Analytic','Personal'
        ]
    ];
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('categories')->truncate();


        foreach($this->supercategoryCount as $id)
        {
            foreach($this->categoryTitleGroups[$id] as $categoryTitle)

           \App\DomainLogic\CategoryDirectory\Category::create([
                'title' => $categoryTitle,
               'superCategory_id' => $id,
            ]);
        }
    }

}