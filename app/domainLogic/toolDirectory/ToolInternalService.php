<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/5/15
 * Time: 5:16 PM
 */

namespace App\DomainLogic\ToolDirectory;


use App\Base\InternalService;
use App\DomainLogic\TagDirectory\Tag;

class ToolInternalService extends InternalService{


    public function __construct()
    {
        $this->model = new Tag();
    }

    public function store($credentialsOrAttributes = [])
    {
        //validate attributes

            //if all good

                //add attributes to new model
                //save model to database
                //return model

            //if not good

                //return error message
    }


}