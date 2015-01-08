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


    /**Returns a modelInternalService@store method call response with good attributes.
     * For use on models without an owner.
     * For models with an owner use $this->returnStoreResponseWithGoodAttributesAndGoodOwnerId()
     * @return mixed
     */
    public function returnStoreResponseWithGoodAttributes()
    {
        return $this->callServiceStoreMethodWithValidAttributes();
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

    /***********************************************************************************************************/
    /*                                          Low Level  Helper Methods                                       */
    /***********************************************************************************************************/


    public function getSubjectModelAttributes()
    {
        return $this->service->getModelAttributes();
    }


    public function getSubjectModelAttributesFormat()
    {
        return $this->service->getModelSpecificAttributeValues($this->getSubjectModelAttributes(), 'format');
    }

    public function getSubjectModelSingleOwnerClassName()
    {
        return $this->service->getModelSingleOwnerClassName();
    }

    /**************************************             Fakers           ***********************************************/


    public function fakeGoodEmailAttribute()
    {
        return 'FakeGoodEmailAttribute@myFramework.com';
    }

    public function fakeGoodUrlAttribute()
    {
        return 'http://www.fakeURLFromMyFramework.com';
    }

    public function fakeGoodPasswordAttribute()
    {
        return 'testtest123456FromMyFramework';
    }

    public function fakeGoodStringAttribute()
    {
        return 'FakeGoodStringFromMyFrameWork';
    }

    public function fakeGoodExistsAttribute()
    {
        $ownerClassName = $this->getSubjectModelSingleOwnerClassName();

        return $ownerClassName::create();
    }

    public function fakeGoodTextAttribute()
    {
        $text = 'FakeGoodTextFromMyFramework'.'<br/>'.'FakeGoodTextFromMyFramework'.'<br/>'.'FakeGoodTextFromMyFramework'.'<br/>';
        return $text;
    }


    /***********************************************************************************************************/
    /*                                          Mid Level  Helper Methods                                       */
    /***********************************************************************************************************/



    public function getGoodOrBadAttributesForSubjectModel($subjectModelAttributeFormats, $goodOrBadInLowerCase)
    {
        $attributesToReturn = [];
        foreach($subjectModelAttributeFormats as $nameOfAttribute => $attributeFormat)
        {
            $runThisFakerFormatMethod = 'fake'.ucfirst($goodOrBadInLowerCase).ucfirst($attributeFormat).'Attribute';
            $fakedAttribute = $this->$runThisFakerFormatMethod();
            $attributesToReturn[$nameOfAttribute] = $fakedAttribute;
        }

        return $attributesToReturn;
    }


    public function getValidAttributesForSubjectModelAsArray()
    {
        $subjectModelAttributeFormats = $this->getSubjectModelAttributesFormat();

        $validAttributes = $this->getGoodOrBadAttributesForSubjectModel($subjectModelAttributeFormats, 'good');

        return $validAttributes;
    }

    /***********************************************************************************************************/
    /*                                          High Level Helper Methods                                       */
    /***********************************************************************************************************/

    public function callServiceStoreMethod($attributes)
    {
        return $this->service->store($attributes);
    }

    public function callServiceStoreMethodWithValidAttributes()
    {
        $goodAttributesForStoreMethod = $this->getValidAttributesForSubjectModelAsArray();

        return $this->callServiceStoreMethod($goodAttributesForStoreMethod);
    }





}