<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/30/14
 * Time: 10:22 AM
 */

namespace App\DomainLogic\ImageDirectory;


use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    protected $fillable = ['name' , 'mediumPath', 'smallPath', 'largePath', 'originalPath'];


    protected $table = 'images';



    protected $modelAttributes = [
//		START AT ZERO (0)!!! => [
//
//			'name' => 'nameOfAttribute',
//
//			'format' => '(choose 1: email, url, password,
//							 string, exists, enum, text, id, token, ipAddress, date)',
//
//			'nullable' => false,
//
//			'unique' => true,
//
//			'exists' => null,
//
//          'identifier' => false,
//
//          'key' => false,
//
//
//			'enumValues' => [
//				'item1',
//				'item2',
//				'item3'
//			]
//		],

        0  => [

			'name' => 'name',

			'format' => 'string',

			'nullable' => false,

			'unique' => true,

			'exists' => null,

            'identifier' => false,

            'key' => false,

		],

        1 =>[
            'name' => 'originalPath',

            'format' => 'path',

            'nullable' => false,

            'unique' => true,

            'exists' => null,

            'identifier' => false,

            'key' => false,

        ],

        2 =>[
            'name' => 'smallPath',

            'format' => 'path',

            'nullable' => false,

            'unique' => true,

            'exists' => null,

            'identifier' => false,

            'key' => false,

        ],

        3 =>[
            'name' => 'mediumPath',

            'format' => 'path',

            'nullable' => false,

            'unique' => true,

            'exists' => null,

            'identifier' => false,

            'key' => false,

        ],

        4 =>[
            'name' => 'largePath',

            'format' => 'path',

            'nullable' => false,

            'unique' => true,

            'exists' => null,

            'identifier' => false,

            'key' => false,

        ]



    ];


    public $imageSizes = ['small', 'medium','large'];


    public $originalStorage = 'uploads/original';


    public $smallWidth = 200;

    public $smallHeight = 200;

    public $smallStorage = 'uploads/small';


    public $mediumWidth = 300;

    public $mediumHeight = 300;

    public $mediumStorage = 'uploads/medium';


    public $largeWidth = 400;

    public $largeHeight = 400;

    public $largeStorage = 'uploads/large';


}