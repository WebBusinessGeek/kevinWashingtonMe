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


    /**Returns a modelInternalService@store method call response with good attributes and deletes the owner.
     * For use on models with a single owner.
     * @return mixed
     */
    public function returnStoreResponseWithGoodAttributesThenDestroyOwner()
    {

        $validAttributes = $this->getAttributesForSubjectModelAsArray('good');

        $storeResponse = $this->callServiceStoreMethod($validAttributes);

        $attributeThatRepresentsOwner = $this->getSubjectModelAttributeThatRepresentsOwner();

        $ownerId = $validAttributes[$attributeThatRepresentsOwner];

        $this->deleteSubjectModelOwnerById($ownerId);

        return $storeResponse;

    }


    /**Returns a database instance of the subjectModel after the store method was called.
     * For use on models without an owner.
     * For models with an owner use $this->returnDatabaseInstanceAfterStoreMethodCalledThenDestroyOwner()
     * @return mixed
     */
    public function returnDatabaseInstanceAfterStoreMethodCalled()
    {
        $storeResponse = $this->callServiceStoreMethodWithValidAttributes();

        return $this->getSubjectModelFromDatabase($storeResponse->id);
    }


    /**Returns a database instance of the subjectModel after the store method was called and deletes the owner.
     * For use on models with a single owner.
     * @return mixed
     */
    public function returnDatabaseInstanceAfterStoreMethodCalledThenDestroyOwner()
    {
        $storeResponse = $this->returnStoreResponseWithGoodAttributesThenDestroyOwner();

        $subjectModelInstanceId = $storeResponse->id;

        return $this->getSubjectModelFromDatabase($subjectModelInstanceId);
    }


    /**Returns a store response of the subjectModel service with bad attributes. Should be an error message.
     * For use with models with and without an owner.
     * @return mixed
     */
    public function returnStoreResponseWithBadAttributeNames()
    {
        return $this->callServiceStoreMethodWithBadAttributes();
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


    public function getSubjectModelClassName()
    {
        return $this->service->getModelClassName();
    }

    public function getSubjectModelAttributesFormat()
    {
        return $this->service->getModelSpecificAttributeValues($this->getSubjectModelAttributes(), 'format');
    }

    public function getSubjectModelFromDatabase($id)
    {
        $subjectModelClassName = $this->getSubjectModelClassName();

        return $subjectModelClassName::find($id);
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

    public function fakeBadEmailAttribute()
    {
        return 'FakeBadEmailAttribute';
    }

    public function fakeBadUrlAttribute()
    {
        return 'fakeURLFromMyFramework.com';
    }

    public function fakeBadPasswordAttribute()
    {
        return 'fakeBad';
    }

    public function fakeBadStringAttribute()
    {
        return 1;
    }

    public function fakeBadExistsAttribute()
    {
        return 'aaa';
    }

    public function fakeBadTextAttribute()
    {
        return '';
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



    public function getAttributesForSubjectModelAsArray($goodOrBadInLowerCase)
    {
        $subjectModelAttributeFormats = $this->getSubjectModelAttributesFormat();

        $attributes = $this->getGoodOrBadAttributesForSubjectModel($subjectModelAttributeFormats, $goodOrBadInLowerCase);

        return $attributes;
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
        $goodAttributesForStoreMethod = $this->getAttributesForSubjectModelAsArray('good');

        return $this->callServiceStoreMethod($goodAttributesForStoreMethod);
    }

    public function callServiceStoreMethodWithBadAttributes()
    {
        $invalidAttributes = $this->getAttributesForSubjectModelAsArray('bad');

        return $this->callServiceStoreMethod($invalidAttributes);
    }





}