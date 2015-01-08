<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/8/15
 * Time: 12:58 AM
 */

namespace App\Base;


use Illuminate\Database\Eloquent\Model;

class BaseModelConcrete extends Model {

    protected $fillable = ['name', 'email', 'password', 'website'];

    protected $table = 'baseModelConcretes';

    protected $singleOwnerClassName = '\App\Base\BaseModelConcreteOwner';

    protected $modelAttributes = [


        0 => [
            'name' => 'name',

            'format' => 'string',

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

        1 => [
            'name' => 'email',

            'format' => 'email',

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

        2 => [
            'name' => 'password',

            'format' => 'password',

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

        4 => [
            'name' => 'website',

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


    ];

}


class BaseModelConcreteOwner extends Model {

    protected $table = 'baseModelConcreteOwners';

    protected $fillable = ['name'];

    protected $modelAttributes = [

        0 => [
            'name' => 'name',

            'format' => 'string',

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
    ];

}