<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/5/15
 * Time: 5:16 PM
 */

namespace App\DomainLogic\ToolDirectory;


use App\Base\BaseInternalService;
use App\DomainLogic\TagDirectory\Tag;

class ToolInternalService extends BaseInternalService{


    public function __construct()
    {
        $this->model = new Tool();
    }



    public function runUniqueValidationLogicAndReturnAttributes($attributes = array(), $modelAttributes = array())
    {
        if(isset($attributes['image_id']))
        {
            unset($attributes['image_id']);
        }
        return $attributes;
    }


    public function runUniqueUpdateLogic($toolModel, $validatedAttributes = array(), $originalAttributes = array())
    {
        if(isset($originalAttributes['image_id']))
        {
            $toolModel->images()->sync([$originalAttributes['image_id']]);
        }
    }

}
