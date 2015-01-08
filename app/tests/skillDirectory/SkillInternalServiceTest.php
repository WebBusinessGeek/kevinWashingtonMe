<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 7:47 PM
 */

namespace tests\skillDirectory;


use App\DomainLogic\SkillDirectory\SkillInternalService;
use Illuminate\Foundation\Testing\TestCase;

class SkillInternalServiceTest extends \TestCase{

    /***********************************************************************************************************/
    /*                                          Store method tests                                              */
    /***********************************************************************************************************/

    public function test_skillInternalService_store_method_returns_correct_instance_if_attributes_are_valid()
    {

    }

    public function test_skillInternalService_store_method_saves_instance_in_database_if_attributes_are_valid()
    {

    }

    public function test_skillInternalService_store_method_returns_error_message_if_attributes_are_invalid()
    {

    }

    public function test_skillInternalService_store_method_returns_error_message_if_owner_doesnt_exist()
    {

    }


    /***********************************************************************************************************/
    /*                                          Show method tests                                              */
    /***********************************************************************************************************/





    /***********************************************************************************************************/
    /*                                          Update method tests                                              */
    /***********************************************************************************************************/




    /***********************************************************************************************************/
    /*                                          Destroy method tests                                              */
    /***********************************************************************************************************/



    /***********************************************************************************************************/
    /*                                          Test helper methods                                             */
    /***********************************************************************************************************/


    public function goodStoreResponseForModelWithoutOwnerAtCreation()
    {
        //get attributes off model

        //fake data with valid format for each attribute

        //push data to associative array with attributeNames as keys

        //call service's store method using array

        //return the response
    }

    public function goodStoreResponseForModelWithOwnerAtCreation()
    {
        //get attributes off subject model

        //fake data with valid format for each attribute

        //create owner for the subject model

        //push data to associative array - including the owner's id

        //call service's store method using array

        //delete the subject model's owner

        //return the response from the store method
    }

    public function goodStoreResponseForModelWithMultipleOwnersAtCreation()
    {

    }

    public function createNewServiceSubjectModelInstance()
    {
        return $this->service->createNewModel($this->service->getModelClassName());
    }

    public function createNewOwnerInstanceForSubjectModel()
    {
        return $this->service->createNewModel($this->service->getModelSingleOwnerClassName());
    }

    public function returnGoodAttributes()
    {
        
    }

    public function returnGoodAttributesWithGoodOwnerId()
    {

    }

    public function returnBadAttributeNamesWithGoodOwnerId()
    {

    }

    public function returnGoodAttributesWithBadOwnerId()
    {

    }




    /***********************************************************************************************************/
    /*                                          Test helper properties                                            */
    /***********************************************************************************************************/

    public $service;

    public function __construct()
    {
        $this->service = new SkillInternalService();
    }


}

