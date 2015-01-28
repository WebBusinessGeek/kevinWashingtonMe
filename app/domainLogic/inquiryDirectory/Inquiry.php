<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/12/15
 * Time: 4:59 PM
 */

namespace App\DomainLogic\InquiryDirectory;


use App\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends BaseModel {

    protected $fillable = ['name', 'body', 'contactMethod', 'email', 'phone'];

    protected $table = 'inquiries';

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

            'name' => 'body',

            'format' => 'text',

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

            'name' => 'contactMethod',

            'format' => 'string',

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

            'name' => 'email',

            'format' => 'email',

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

            'name' => 'phone',

            'format' => 'phoneNumber',

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