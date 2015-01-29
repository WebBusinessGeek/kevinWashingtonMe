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
            'Keyword Research','OnSite Markup Optimization','Niche Blog Development','Keyword Selection','SERP Competition Research',
            'SEO Vendor Qualification'
        ],

        8 => [
            'Paid Advertising Strategy','Paid Advertising Campaign Audit','Paid Advertising Campaign Optimization'
        ],

        9 => [
            'A/B Testing','Experiment Development','Experiment Management','Data Informed Decision Making','Conversion Optimization'
        ],

        10 => [
            'Landing Page Development','Landing Page Promotion','Landing Page Strategy'
        ],

        11 => [
            'Product Demonstrations','Presentations','Value Building','Needs Assessments','Solution Based Selling','Follow Up',
            'Objection Handling','Effective Questioning'
        ],

        12 => [
            'Revenue Segmentation','Budget Development','Disciplined Spending'
        ],

        13 => [
            'Recruiting','Team Development','Team Structure','Team Accountability','Delegation','Leading Over Managing Mentality',
            'Remote Management'
        ],

        14 => [
            'Process Need Identification','Process Development','Process Optimization','Process Elimination'
        ],

        15 => [
            'Objective Identification','Objective Based Project Management','Objective Achievement Strategy'
        ],

        16 => [
            'Listening','Curiosity','Communication Skills','Conflict Resolution','Team Buy-In'
        ],

        17 => [
            'Process Quantification','Success Tracking','Critical Thinking','Data Informed Decision Making','Report Development'
        ],

        18 => [
            'Creative Thinking','Owner Mentality','Problem Solving','Research','Empathy','Integrity','Organization',
            'Learning','Competency Over Confidence Mentality','Persuasive Writing','Patience','Always Be Optimizing Mentality',
            'Reverse Engineering'
        ]
    ];
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('skills')->truncate();


        foreach($this->categoryCount as $id)
        {
            foreach($this->skillTitleGroups[$id] as $title)
            {
                \App\DomainLogic\SkillDirectory\Skill::create([
                    'title' => $title,
                    'category_id' => $id,
                    'article' => 'This will be a short article to show my knowledge of the subject '.$title.
                                    '. This will be a short article to show my knowledge of the subject '.$title.
                                    '. This will be a short article to show my knowledge of the subject '.$title.
                                    '. This will be a short article to show my knowledge of the subject '.$title.
                                    '. This will be a short article to show my knowledge of the subject '.$title,
                    'definition' => 'This will be a short definition about '.$title.' which I have not written yet.',
                ]);
            }

        }
    }
}