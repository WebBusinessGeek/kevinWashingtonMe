<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 7:45 PM
 */

namespace App\DomainLogic\SkillDirectory;


use Illuminate\Database\Eloquent\Model;

class Skill extends Model {

    protected $fillable = ['title', 'category_id', 'article', 'definition'];

    protected $table = 'skills';

    protected $with = ['tools', ];

    protected $singleOwnerClassName = '\App\DomainLogic\CategoryDirectory\Category';

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function tools()
    {
        return $this->hasMany('App\DomainLogic\ToolDirectory\Tool');
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