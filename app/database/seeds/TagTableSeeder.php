<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/21/15
 * Time: 4:57 PM
 */

use Faker\Factory as Faker;
class TagTableSeeder  extends \Illuminate\Database\Seeder{

    protected $tagTitles = [
        'Research','Development','Project Management','Coding','Tech','Code','Strategy',
        'Software','Marketing','SEO','Search Engine Optimization','Email Marketing',
        'Management','Link Building','Traffic','Lead Generation', 'Content Marketing',
        'Advertising', 'Keyword','Landing Page','Conversion Rate Optimization','Sales',
        'Personal','Agile','Scrum','Creative','Design','Personality','LPO','Traits','Data',
        'Analytics','CRO','Guerilla Marketing','Optimization'
    ];
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('tags')->truncate();

        foreach($this->tagTitles as $title)
        {
            \App\DomainLogic\TagDirectory\Tag::create([
                'title' => $title,
            ]);
        }
    }
}