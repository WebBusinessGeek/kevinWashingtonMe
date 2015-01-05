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
        if($this->modelAcceptsAttributes($credentialsOrAttributes,$modelAttributes)
            &&
            $this->checkMajorFormatsAreValid($credentialsOrAttributes, $modelAttributes)
        )
        {
            //create model, attach attributes, store in correct database table
          return $this->storeEloquentModelInDatabase($this->addAttributesToNewModel($credentialsOrAttributes, $this->getModelClassName()));
        }

        return $this->sendMessage('Invalid attributes sent to method.');
    }

    /**Retrieves the specified tag instance from the database if it exists, otherwise returns an error message.
     * @param $model_id
     * @return string
     */
    public function show($model_id)
    {
        return parent::show($model_id);
    }


    /**Removes specified tag instance from database if it exists. Otherwise returns error message.
     * @param $model_id
     * @return mixed|string
     */
    public function destroy($model_id)
    {
       return parent::destroy($model_id);
    }


    /**Updates the specified tag instance if it exists. Otherwise will throw an error message.
     * @param $model_id
     * @param array $attributes
     * @return array|\Illuminate\Database\Eloquent\Model|string
     */
    public function update($model_id, $attributes = array())
    {
        return parent::update($model_id, $attributes);
    }


    public function index($paginationCount)
    {
        return parent::index($paginationCount);
    }


    /**Descendant 'Hook' for parent::update method validations.
     * @param array $attributes
     * @return array|mixed
     */
    public function uniqueValidationLogic($attributes = array())
    {
        return ($this->modelAcceptsAttributes($attributes, $this->getModelAttributes()))? $attributes: $this->sendMessage('Invalid attributes given.');
    }

}