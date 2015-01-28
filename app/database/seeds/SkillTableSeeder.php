<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/21/15
 * Time: 5:26 PM
 */

use Faker\Factory as Faker;

class SkillTableSeeder extends \Illuminate\Database\Seeder {

    protected $categoryCount = [
        1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18
    ];

    protected $skillTitleGroups = [
        1 => [
            'Customer Research','Market Research','Competitor Research'
        ],

        2=> [
            'UML Modeling','App Entity Identification','Software Architecture','Branding','Revenue Generation Strategy',
            'Beach Head Market Selection','Beach Head Market Penetration Tactics','Follow On Market Selection','Marketing Strategy'
        ],

        3 => [
            'Laravel Development','AngularJS Component Development','Angular on Laravel','Twitter Bootstrap','PHP',
            'HTML','CSS3','jQuery','Professional Coding','OOP','Database Architecture','Rails Project Management',
            'Software Project Management','Scrum Project Management'
        ],

        4 => [
            'Email Content Creation','Email Marketing Strategy','Email Marketing Campaign Management',
            'Email Marketing Campaign Optimization','Creative List Building'
        ],

        5 => [
            'Link Opportunity Research','Link Quality Research','Linkable Asset Development','Linkable Asset Strategy'
        ],

        6 => [
            'Content Marketing Strategy','Funnel Development','Content Creation','Content Marketing Success Audit','Content Marketing Optimization',
            'Content Promotion'
        ],

        7 => [
            'Keyword Research','OnSite Markup Optimization','Niche Blog Development','Keyword Selection','SERP Competition Research', 'Vendor Qualification'
        ],

        8 => [
            'Paid Advertising Campaign Strategy','Paid Advertising Campaign Audit','Paid Advertising Campaign Optimization'
        ]
    ];
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('skills')->truncate();

        $faker = Faker::create();
        foreach(range(1, 15) as $index)
        {

            \App\DomainLogic\SkillDirectory\Skill::create([
                'title' => 'Skill'.$faker->word(),
                'category_id' => rand(1, 15),
                'article' => $faker->sentence(),
                'definition' => $faker->sentence(),
            ]);
        }
    }
}