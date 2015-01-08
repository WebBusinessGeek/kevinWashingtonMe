<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 11:58 PM
 */

namespace App\Base;


use Illuminate\Foundation\Testing\TestCase;
use Symfony\Component\Routing\Exception\MissingMandatoryParametersException;

abstract class InternalServiceTestLibrary extends \TestCase{

    public $service;

    /***********************************************************************************************************/
    /*                                          Test Streamlining                                             */
    /***********************************************************************************************************/


    public function returnStoreResponseWithGoodAttributes()
    {
        //get attributes off model

        //fake data with valid format for each attribute

        //push data to associative array with attributeNames as keys

        //call service's store method using array

        //return the response
    }

    public function returnStoreResponseWithGoodAttributesAndGoodOwnerId()
    {
        //get attributes off subject model

        //fake data with valid format for each attribute

        //create owner for the subject model

        //push data to associative array - including the owner's id

        //call service's store method using array

        //delete the subject model's owner

        //return the response from the store method
    }

    public function returnDatabaseInstanceAfterStoreMethodCalled()
    {

    }

    public function returnStoreResponseWithBadAttributeNames()
    {

    }

    public function returnStoreResponseWithBadOwnerId()
    {

    }

    public function returnShowResponseWithGoodId()
    {

    }

    public function returnShowResponseWithBAdSubjectModelId()
    {

    }

    public function returnUpdateResponseWithGoodIdAndGoodAttributesBeforeAndAfterUpdate()
    {

    }

    public function returnUpdateResponseWithGoodIdAndGoodAttributesAndGoodOwnerIdBeforeAndAfterUpdate()
    {

    }

    public function returnDatabaseInstanceAfterUpdateMethodCalled()
    {

    }

    public function returnUpdateResponseWithBadAttributeNames()
    {

    }

    public function returnUpdateResponseWithBadOwnerId()
    {

    }

    public function returnUpdateResponseWithBadSubjectModelId()
    {

    }

    public function returnDatabaseInstanceAfterDestroyMethodCalled()
    {

    }

    public function returnDestroyResponseWithBadSubjectModelId()
    {

    }

    public function returnRelationshipsToModelAfterDestroyMethodCalled()
    {

    }

    /***********************************************************************************************************/
    /*                                          Test Streamlining Helper Methods                                */
    /***********************************************************************************************************/


    public function createNewServiceSubjectModelInstance()
    {
        return $this->service->createNewModel($this->service->getModelClassName());
    }

    public function createNewOwnerInstanceForSubjectModel()
    {
        return $this->service->createNewModel($this->service->getModelSingleOwnerClassName());
    }


}