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
        if(isset($attributes['tool_id']))
        {
            unset($attributes['tool_id']);
        }
        if(isset($attributes['image_id']))
        {
            unset($attributes['image_id']);
        }
        return ($this->existsIsValid($attributes, $modelAttributes)) ? $attributes : false ;
    }




    public function runUniqueUpdateLogic($skillModel, $validatedAttributes, $originalAttributes)
    {
        if(isset($originalAttributes['tool_id']))
        {
            $skillModel->tools()->attach($originalAttributes['tool_id']);
        }
        if(isset($originalAttributes['image_id']))
        {
            $skillModel->images()->attach($originalAttributes['image_id']);
        }
    }
}