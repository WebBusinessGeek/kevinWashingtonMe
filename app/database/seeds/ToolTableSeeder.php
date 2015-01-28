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
        'Google Adwords','FaceBook Ads','Open Site Explorer','MixPanel','ProMedia Suggester Tool','Git Version Control',
        'GitHub','Terminal','StumbleUpon Ads','Google Docs','Google SERPs','MozBar','SEOquake','LucidCharts','Trello',
        'Asana','VWO','PhotoShop','Sketching','MockingBird WireFraming Tool','Google Spreadsheets','Elance','Craigslist',
        'Indeed','Slack','Skype','PHP Storm','Sublime Text','Sequel Pro','Laravel Forge','Homestead','Vagrant',
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