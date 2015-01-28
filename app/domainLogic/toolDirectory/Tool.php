<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/5/15
 * Time: 5:16 PM
 */

namespace App\DomainLogic\ToolDirectory;


use App\Base\BaseModel;
use App\DomainLogic\SkillDirectory\Skill;
use Illuminate\Database\Eloquent\Model;

class Tool extends BaseModel {

    protected $fillable = ['title'];

    protected $table = 'tools';

    protected $attributesToUnset = [
        'image_id',
    ];

    public function skills()
    {
        return $this->belongsToMany('\App\DomainLogic\SkillDirectory\Skill');
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


    ];

}