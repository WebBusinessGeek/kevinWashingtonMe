<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/5/15
 * Time: 5:16 PM
 */

namespace App\DomainLogic\ToolDirectory;


use App\Base\InternalService;

class ToolInternalService extends InternalService{

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

    public function show($model_id)
    {
        return parent::show($model_id);
    }

    public function update($model_id, $attributes = array())
    {
        return parent::update($model_id, $attributes);
    }


    public function destroy($model_id)
    {
        return parent::destroy($model_id);
    }

    public function index($paginationCount)
    {
        return parent::index($paginationCount);
    }
}