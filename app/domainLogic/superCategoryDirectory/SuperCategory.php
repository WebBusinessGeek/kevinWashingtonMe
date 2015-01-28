<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/6/15
 * Time: 6:19 PM
 */

namespace App\DomainLogic\SuperCategoryDirectory;


use App\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;

class SuperCategory extends BaseModel{


    protected $fillable = ['title'];

    protected $table = 'superCategories';

    protected $with = 'categories';

    public function categories()
    {
        return $this->hasMany('\App\DomainLogic\CategoryDirectory\Category', 'superCategory_id');
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