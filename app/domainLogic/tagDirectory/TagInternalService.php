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


    /**Creates and stores a new tag instance in database if attributes passed in are valid. Otherwise returns error message.
     * @param array $credentialsOrAttributes
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function store($credentialsOrAttributes = [])
    {
        //setup
        $modelAttributes = $this->getModelAttributes();

        //run validations for data integrity
        if($this->checkModelAcceptsAttributes($credentialsOrAttributes,$modelAttributes)
            &&
            $this->checkMajorFormatsAreValid($credentialsOrAttributes, $modelAttributes)
        )
        {
            //create model, attach attributes, store in correct database table
          return $this->storeEloquentModelInDatabase($this->addAttributesToNewModel($credentialsOrAttributes, $this->getModelClassName()));
        }

        return $this->sendMessage('Invalid attributes sent to method.');
    }



    /**Descendant 'Hook' for parent::update method validations.
     * @param array $attributes
     * @return array|mixed
     */
    public function uniqueValidationLogic($attributes = array())
    {
        return ($this->checkModelAcceptsAttributes($attributes, $this->getModelAttributes()))? $attributes: $this->sendMessage('Invalid attributes given.');
    }

}