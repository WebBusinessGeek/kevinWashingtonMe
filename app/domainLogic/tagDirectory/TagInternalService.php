<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/2/15
 * Time: 5:43 PM
 */

namespace App\DomainLogic\TagDirectory;


use App\Base\InternalService;

class TagInternalService extends InternalService {

    public function __construct()
    {
        $this->model = new Tag();
    }



    /**Descendant 'Hook' for parent::update method validations.
     * @param array $attributes
     * @return array|mixed
     */
    public function runUniqueValidationLogicAndReturnAttributes($attributes = array())
    {
        return ($this->checkModelAcceptsAttributes($attributes, $this->getModelAttributes()))? $attributes: $this->sendMessage('Invalid attributes given.');
    }

}