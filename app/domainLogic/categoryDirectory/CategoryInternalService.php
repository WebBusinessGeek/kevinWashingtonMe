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


    /**HOOK into parent::store method to run unique validations from this class.
     * @param array $attributes
     * @param array $modelAttributes
     * @return bool
     */
    public function checkUniqueValidationLogicAndReturnBoolean($attributes = array(), $modelAttributes = array())
    {
        return $this->existsIsValid($attributes, $modelAttributes);
    }


    /**HOOK into parent::update method to run unique validations from this class.
     * @param array $attributes
     * @param array $modelAttributes
     * @return bool
     */
    public function runUniqueValidationLogicAndReturnAttributes($attributes = array(), $modelAttributes = array())
    {
        return ($this->checkUniqueValidationLogicAndReturnBoolean($attributes, $modelAttributes))? $attributes : false;
    }
}