<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/12/15
 * Time: 8:16 PM
 */

namespace App\DomainLogic\ExperienceDirectory;


use App\Base\BaseInternalService;

class ExperienceInternalService extends BaseInternalService {

    public function __construct()
    {
        $this->model = new Experience();
    }



    public function runUniqueValidationLogicAndReturnAttributes($attributes = array (), $modelAttributes = array())
    {
      return $attributes = $this->unsetMultipleKeysIfTheyExistInArray($this->getModelAttributesToUnset(), $attributes);
    }


    public function runUniqueUpdateLogic($experienceModel, $validatedAttributes = array() , $originalAttributes = array())
    {
        if(isset($originalAttributes['image_id']))
        {
            $experienceModel->images()->sync([$originalAttributes['image_id']]);
        }
    }

}