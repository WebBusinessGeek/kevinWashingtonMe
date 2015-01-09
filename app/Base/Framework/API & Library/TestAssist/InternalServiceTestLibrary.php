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
     * For models with an owner use $this->returnStoreResponseWithGoodAttributesThenDestroyOwner()
     * @return mixed
     */
    public function returnStoreResponseWithGoodAttributes()
    {
        return $this->callServiceStoreMethodWithValidAttributes();
    }


    /**Returns a modelInternalService@store method call response with good attributes.
     * For use on models with a single owner.
     * @return mixed
     */
    public function returnStoreResponseWithGoodAttributesThenDestroyOwner()
    {

        $validAttributes = $this->getValidAttributesForSubjectModelAsArray();

        $storeResponse = $this->callServiceStoreMethod($validAttributes);

        $attributeThatRepresentsOwner = $this->getSubjectModelAttributeThatRepresentsOwner();

        $ownerId = $validAttributes[$attributeThatRepresentsOwner];

        $this->deleteSubjectModelOwnerById($ownerId);

        return $storeResponse;

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

    public function getArrayKeysWhereValueIsNotNull($associativeArray)
    {
        $keysWithValueNotEqualToNull = [];
        foreach($associativeArray as $attributeName => $attributeValue)
        {
            ($attributeValue == null) ? : array_push($keysWithValueNotEqualToNull, $attributeName);
        }
        return $keysWithValueNotEqualToNull;
    }


    public function deleteSubjectModelOwnerById($ownerId)
    {
        $ownerClassName = $this->getSubjectModelSingleOwnerClassName();

        $ownerClassName::destroy($ownerId);
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

        return $ownerClassName::create([''])->id;
    }

    public function fakeGoodTextAttribute()
    {
        $text = 'FakeGoodTextFromMyFramework'.'<br/>'.'FakeGoodTextFromMyFramework'.'<br/>'.'FakeGoodTextFromMyFramework'.'<br/>';
        return $text;
    }


    /***********************************************************************************************************/
    /*                                          Mid Level  Helper Methods                                       */
    /***********************************************************************************************************/


    public function getSubjectModelAttributeThatRepresentsOwner()
    {

        $existValuesOnSubjectModel = $this->service->getModelSpecificAttributeValues($this->getSubjectModelAttributes(), 'exists');

        $attributesWithExistValueSet = $this->getArrayKeysWhereValueIsNotNull($existValuesOnSubjectModel);

        if(count($attributesWithExistValueSet) > 1)
        {
            throw new \Exception('Subject Model has more than one owner according to attributes.');
        }

        return $attributesWithExistValueSet[0];
    }


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