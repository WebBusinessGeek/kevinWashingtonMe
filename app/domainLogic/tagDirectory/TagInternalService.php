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
       return $this->getEloquentModelFromDatabase($model_id, $this->getModelClassName());
    }


    /**Removes specified tag instance from database if it exists. Otherwise returns error message.
     * @param $model_id
     * @return mixed|string
     */
    public function destroy($model_id)
    {

        $potentialModel = $this->show($model_id);
        if($this->isModelInstance($potentialModel))
        {
            return $this->deleteEloquentModelFromDatabase($potentialModel, $this->getModelClassName());
        }

        return $potentialModel;

    }



    public function update($model_id, $attributes = array())
    {
        // TODO: Implement update() method.
    }


    public function index()
    {
        // TODO: Implement index() method.
    }


}