<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 2:13 PM
 */

namespace App\DomainLogic\CategoryDirectory;


use App\DomainLogic\SkillDirectory\Skill;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $fillable = ['title', 'superCategory_id'];

    protected $table = 'categories';


    protected $singleOwnerClassName = '\App\DomainLogic\SuperCategoryDirectory\SuperCategory';

    protected $with = 'skills';

    public function skills()
    {
        return $this->hasMany('App\DomainLogic\SkillDirectory\Skill', 'category_id');
    }

    public function superCategory()
    {
        return $this->belongsTo('App\DomainLogic\SuperCategory\Directory\SuperCategory');
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

            'name' => 'superCategory_id',

            'format' => 'exists',

            'nullable' => false,

            'unique' => true,

            'exists' => '\App\DomainLogic\SuperCategoryDirectory\SuperCategory',

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