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
        'Research','Development','Project Management','Coding','Tech','Code','Strategy','Architecture',
        'Software','Marketing','SEO','Search Engine Optimization','Email Marketing','Guerilla Marketing',
        'Management','Optimization','Auditing','Link Building','Traffic','Lead Gen','Lead Generation',
        'Content Marketing','Content','Advertising','Keyword','Landing Page','Experiment','LPO','Sales',
        'Personal','Personality','Traits','Design','Analytics','Data', 'CRO'
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