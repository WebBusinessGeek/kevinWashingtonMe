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
        foreach(range(1,10) as $tagCount)
        {
            if(array_key_exists('tag_id'.$tagCount,$attributes))
            {
                unset($attributes['tag_id'.$tagCount]);
            }
        }
        return ($this->existsIsValid($attributes, $modelAttributes)) ? $attributes : false ;
    }




    public function runUniqueUpdateLogic($potentialModel, $validatedAttributes = array(), $attributes = array())
    {
        if(isset($attributes['tool_id']))
        {
            $potentialModel->tools()->attach($attributes['tool_id']);
        }
        if(isset($attributes['image_id']))
        {
            $potentialModel->images()->sync([$attributes['image_id']]);
        }

        $tagsToSync = [];
        foreach(range(1,10) as $tagCount)
        {
            if(array_key_exists('tag_id'.$tagCount,$attributes) && $attributes['tag_id'.$tagCount] != null)
            {
               array_push($tagsToSync, $attributes['tag_id'.$tagCount]);
            }
        }
        $potentialModel->tags()->sync($tagsToSync);



    }
}