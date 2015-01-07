<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 2:14 PM
 */

namespace App\DomainLogic\CategoryDirectory;


use App\Base\InternalService;

class CategoryInternalService extends InternalService {

    public function __construct()
    {
        $this->model = new Category();
    }


    public function checkUniqueValidationLogicAndReturnBoolean($attributes = array(), $modelAttributes = array())
    {
        return $this->existsIsValid($attributes, $modelAttributes);
    }


}