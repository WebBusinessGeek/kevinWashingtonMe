<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 7:45 PM
 */

namespace App\DomainLogic\SkillDirectory;


use App\DomainLogic\ImageDirectory\Image;
use App\DomainLogic\ToolDirectory\Tool;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model {

    protected $fillable = ['title', 'category_id', 'article', 'definition'];

    protected $table = 'skills';

    protected $singleOwnerClassName = '\App\DomainLogic\CategoryDirectory\Category';

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function tools()
    {
        return $this->belongsToMany('\App\DomainLogic\ToolDirectory\Tool');
    }

    public function images()
    {
        return $this->morphToMany('\App\DomainLogic\ImageDirectory\Image', 'imageable');
    }

    protected $modelAttributes = [
        0 => [

            'name' => 'title',

            'format' => 'string',

            'nullable' => false,

            'unique' => true,

            'exists' => null,

            'identifier' => false,

            'key' => false,


            'enumValues' => [
                'item1',
                'item2',
                'item3'
            ]
        ],

        1 => [

            'name' => 'category_id',

            'format' => 'exists',

            'nullable' => false,

            'unique' => true,

            'exists' => '\App\DomainLogic\CategoryDirectory\Category',

            'identifier' => false,

            'key' => false,


            'enumValues' => [
                'item1',
                'item2',
                'item3'
            ]
        ],

        2 => [

            'name' => 'article',

            'format' => 'text',

            'nullable' => false,

            'unique' => true,

            'exists' => null,

            'identifier' => false,

            'key' => false,


            'enumValues' => [
                'item1',
                'item2',
                'item3'
            ]
        ],

        3 => [

            'name' => 'definition',

            'format' => 'text',

            'nullable' => false,

            'unique' => true,

            'exists' => null,

            'identifier' => false,

            'key' => false,


            'enumValues' => [
                'item1',
                'item2',
                'item3'
            ]
        ],


    ];

}