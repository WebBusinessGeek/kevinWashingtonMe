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


    public function store($credentialsOrAttributes = [])
    {
        //setup
        $passToStoreMethodIfValid = ['title' => $credentialsOrAttributes['title']];
        $modelAttributes = $this->getModelAttributes();

        //run validations for data integrity
        if($this->modelAcceptsAttributes($credentialsOrAttributes,$modelAttributes)
            &&
            $this->checkMajorFormatsAreValid($passToStoreMethodIfValid, $modelAttributes)
        )
        {
            //create model, attach attributes, store in correct database table
          return $this->storeEloquentModelInDatabase($this->addAttributesToNewModel($credentialsOrAttributes, $this->getModelClassName()));
        }

        return $this->sendMessage('Invalid attributes sent to method.');
    }

    public function show($model_id)
    {
        // TODO: Implement show() method.
    }


    public function destroy($model_id)
    {
        // TODO: Implement destroy() method.
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