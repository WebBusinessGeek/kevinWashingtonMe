<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/12/15
 * Time: 8:11 PM
 */

namespace App\DomainLogic\ExperienceDirectory;


use App\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Experience extends BaseModel {

    protected $fillable = ['name', 'url', 'highlights', 'rolesResponsibilities', 'interview'];

    protected $table = 'experiences';

    protected $attributesToUnset = [
        'image_id',
    ];

    public function images()
    {
        return $this->morphToMany('\App\DomainLogic\ImageDirectory\Image', 'imageable');
    }

    protected $modelAttributes = [
        0 => [

            'name' => 'name',

            'format' => 'string',

            'nullable' => false,

            'unique' => true,

            'exists' => null,

            'identifier' => true,

            'key' => false,


            'enumValues' => [
                'item1',
                'item2',
                'item3'
            ]
        ],

        1 => [

            'name' => 'url',

            'format' => 'url',

            'nullable' => false,

            'unique' => false,

            'exists' => null,

            'identifier' => false,

            'key' => false,


            'enumValues' => [
                'item1',
                'item2',
                'item3'
            ]
        ],

        2 => [

            'name' => 'highlights',

            'format' => 'text',

            'nullable' => false,

            'unique' => true,

            'exists' => null,

            'identifier' => false,

            'key' => false,


            'enumValues' => [
                'email',
                'phone',
                'skype'
            ]
        ],

        3 => [

            'name' => 'rolesResponsibilities',

            'format' => 'text',

            'nullable' => true,

            'unique' => false,

            'exists' => null,

            'identifier' => false,

            'key' => false,


            'enumValues' => [
                'item1',
                'item2',
                'item3'
            ]
        ],

        4 => [

            'name' => 'interview',

            'format' => 'text',

            'nullable' => true,

            'unique' => false,

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