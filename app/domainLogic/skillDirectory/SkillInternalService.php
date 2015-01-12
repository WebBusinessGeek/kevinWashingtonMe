<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 7:46 PM
 */

namespace App\DomainLogic\SkillDirectory;


use App\Base\BaseInternalService;

class SkillInternalService extends BaseInternalService {

    public function __construct()
    {
        $this->model = new Skill();
    }

    /**Hook into parent::store method and run unique validations for class.
     * @param array $credentialsOrAttributes
     * @param array $modelAttributes
     * @return bool
     */
    public function checkUniqueValidationLogicAndReturnBoolean($credentialsOrAttributes = array(), $modelAttributes = array())
    {
        return $this->existsIsValid($credentialsOrAttributes, $modelAttributes);
    }

    /**Hook into parent::update method and run unique validations for class.
     * @param array $attributes
     * @param array $modelAttributes
     * @return array|bool
     */
    public function runUniqueValidationLogicAndReturnAttributes($attributes = array(), $modelAttributes = array())
    {
        return ($this->existsIsValid($attributes, $modelAttributes)) ? $attributes : false ;
    }

}