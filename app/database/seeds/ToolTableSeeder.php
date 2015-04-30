<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/22/15
 * Time: 12:21 PM
 */

use Faker\Factory as Faker;
class ToolTableSeeder  extends \Illuminate\Database\Seeder {

    protected $toolTitles = [
        'Google Docs',
        'Google Spreadsheets',
        'Google SERPs',
        'Custom Frameworks',
        'Industry Performance Reports',
        'LucidCharts',
        'Software Design Patterns',
        'SOLID Object oriented design',
        'PhotoShop',
        'WatchOut4Snakes word generator',
        'Whiteboards',
        'Elance ',
        'Job Postings',
        'Craigslist',
        'Indeed',
        'Salary Tools',
        'Competitor Inquiries',
        'PHP Storm',
        'Terminal',
        'GitHub',
        'Git',
        'Laravel Homestead',
        'Artisan',
        'Composer',
        'PHPUnit',
        'Digital Ocean',
        'Laravel Forge',
        'MySQL',
        'Laravel Migrations',
        'Trello',
        'Asana',
        'Agile Methodologies',
        'Scrum Methodologies',
        'ToutApp UI',
        'Mandrill',
        'OpenSiteExplorer',
        'MozBar',
        'SEOQuake',
        'Google Analytics',
        'Clicky',
        'Custom Analytic Tools',
        'Custom Reporting Tools',
        'Pro Media Suggester tool',
        'Google Keyword Planner',
        'Yoast',
        'Blogger',
        'WordPress',
        'Skype',
        'Google Hangouts',
        'Google AdWords',
        'VWO',
        'GoMockingBird',
        'Join.me',
        'Slack',
        'Ears :)',
        'Facebook Ads',
        'StumbleUpon Ads',
        'Sketch Paper & Pen',
        'Sublime Text',
        'Sequel Pro',
        'Vagrant',
        'Mixpanel',
        'Postman',
        'Majestic SEO',
        'Google Forms',
        'Market Population Tools',
        'StackOverflow',
        'CodePen',
        'CSSDeck',
        'BootPly',
        'Sales Skills',
        'Character/Personality',
    ];
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('tools')->truncate();

        foreach($this->toolTitles as $title)
        {
            \App\DomainLogic\ToolDirectory\Tool::create([
                'title' => $title,
            ]);
        }
    }

}