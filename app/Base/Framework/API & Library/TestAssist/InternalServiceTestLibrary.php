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

        $validAttributes = $this->getFakeGoodOrBadAttributesForSubjectModelAsArray('good');

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
     * For use with any models with and without an owner.
     * @return mixed
     */
    public function returnStoreResponseWithBadAttributeValues()
    {
        return $this->callServiceStoreMethodWithBadAttributes();
    }


    /**Returns a store response of the subjectModel service with Good attributes but a bad id for the owner.
     * For use with models with an owner.
     * @return mixed
     */
    public function returnStoreResponseWithGoodAttributeValuesButBadOwnerId()
    {
        $goodAttributes = $this->getFakeGoodOrBadAttributesForSubjectModelAsArray('good');

        $goodAttributesWithBadOwnerId = $this->exchangeGoodOwnerIdWithBadId($goodAttributes);

        return $this->callServiceStoreMethod($goodAttributesWithBadOwnerId);
    }


    /**Returns show method response for subjectModel service using a good id.
     * For use on models without an owner.
     * For models with an owner use $this->returnShowResponseWithGoodIdForSubjectModelWithOwner()
     * @return mixed
     */
    public function returnShowResponseWithGoodIdForSubjectModelWithoutOwner()
    {
        $storeResponse = $this->callServiceStoreMethodWithValidAttributes();

        $subjectModelId = $storeResponse->id;

        return $this->callServiceShowMethod($subjectModelId);
    }


    /**Returns a show method response from subjectModel service using a good id for model with an owner.
     * For use on models with an owner.
     * For models without an owner use $this->returnShowResponseWithGoodIdForSubjectModelWithoutOwner()
     * @return mixed
     */
    public function returnShowResponseWithGoodIdForSubjectModelWithOwner()
    {
        $storeResponse = $this->returnStoreResponseWithGoodAttributesThenDestroyOwner();

        $subjectModelId = $storeResponse->id;

        return $this->callServiceShowMethod($subjectModelId);
    }


    /**Returns response of show method on subjectModel service using a bad id.
     * For use on any models. Both with and without an owner.
     * @return mixed
     */
    public function returnShowResponseWithBadIdForSubjectModel()
    {
        $badId = 'aaa';

        return $this->callServiceShowMethod($badId);
    }


    /**Returns an array of the subjectModel before and after update method called with good id and attributes.
     * Returns before, after, and afterFromDB instances
     * For use on models without an owner.
     * For models with an owner you should use $this->returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithOwner()
     * @return array
     */
    public function returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithoutOwner()
    {
        $arrayOfOriginalAndUpdatedSubjectModel = $this->returnUpdateResponseWithGoodIdAndGoodAttributesBeforeAndAfterUpdate();

        $subjectModelId = $arrayOfOriginalAndUpdatedSubjectModel['after']->id;

        $arrayOfOriginalAndUpdatedSubjectModel['afterFromDB'] = $this->getSubjectModelFromDatabase($subjectModelId);

        return $arrayOfOriginalAndUpdatedSubjectModel;
    }


    /**Returns an array of the subjectModel before and after the update method is called on the service, with good id and attributes.
     * Returns before, after, and afterFromDB instances
     * For use on models with an owner
     * For models without an owner you should use $this->returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithoutOwner()
     * @return array
     */
    public function returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithOwner()
    {
        $arrayOfOriginalAndUpdatedSubjectModelWithOwner = $this->returnUpdateResponseWithGoodIdAndGoodAttributesAndGoodOwnerIdBeforeAndAfterUpdate();

        $subjectModelId = $arrayOfOriginalAndUpdatedSubjectModelWithOwner['after']->id;

        $arrayOfOriginalAndUpdatedSubjectModelWithOwner['afterFromDB'] = $this->getSubjectModelFromDatabase($subjectModelId);

        return $arrayOfOriginalAndUpdatedSubjectModelWithOwner;
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

    public function getSubjectModelExistValues()
    {
        return $this->getSubjectModelSpecificAttributeValues('exists');
    }

    public function getSubjectModelSpecificAttributeValues($value)
    {
        return $this->service->getModelSpecificAttributeValues($this->getSubjectModelAttributes(), $value);
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
        return 'FakeGoodEmailAttribute'.md5(rand(1209382, 102938102938109238)).'@myFramework.com';
    }

    public function fakeGoodUrlAttribute()
    {
        return 'http://www.fakeURLFromMyFramework'.md5(rand(1209382, 102938102938109238)).'.com';
    }

    public function fakeGoodPasswordAttribute()
    {
        return 'testtest'.md5(rand(1209382, 102938102938109238)).'FromMyFramework';
    }

    public function fakeGoodStringAttribute()
    {
        return 'FakeGoodString'.md5(rand(1209382, 102938102938109238)).'FromMyFrameWork';
    }

    public function fakeGoodExistsAttribute()
    {
        $ownerClassName = $this->getSubjectModelSingleOwnerClassName();

        return $ownerClassName::create([''])->id;
    }

    public function fakeGoodTextAttribute()
    {
        $text = 'FakeGoodText'.md5(rand(1209382, 102938102938109238)).'FromMyFramework'.'<br/>'.'FakeGoodText'.md5(rand(1209382, 102938102938109238)).'FromMyFramework'.'<br/>'.'FakeGoodText'.md5(rand(1209382, 102938102938109238)).'FromMyFramework'.'<br/>';
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

        $existValuesOnSubjectModel = $this->getSubjectModelExistValues();

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
            $dynamicMethodToReturnFakeAttribute = 'fake'.ucfirst($goodOrBadInLowerCase).ucfirst($attributeFormat).'Attribute';

            $fakedAttribute = $this->$dynamicMethodToReturnFakeAttribute();

            $attributesToReturn[$nameOfAttribute] = $fakedAttribute;
        }

        return $attributesToReturn;
    }



    public function getFakeGoodOrBadAttributesForSubjectModelAsArray($goodOrBadInLowerCase)
    {
        $formatsForSubjectModelAttributes = $this->getSubjectModelAttributesFormat();

        $attributes = $this->getGoodOrBadAttributesForSubjectModel($formatsForSubjectModelAttributes, $goodOrBadInLowerCase);

        return $attributes;
    }

    public function exchangeGoodOwnerIdWithBadId($attributesToChange)
    {
        $badId = 'aaa';

        $attributeThatRepresentsOwner = $this->getSubjectModelAttributeThatRepresentsOwner();

        $this->deleteSubjectModelOwnerById($attributesToChange[$attributeThatRepresentsOwner]);

        $attributesToChange[$attributeThatRepresentsOwner] = $badId;

        return $attributesToChange;
    }

    /***********************************************************************************************************/
    /*                                          High Level Helper Methods                                       */
    /***********************************************************************************************************/

    /**Returns an array containing the original store response of subjectModel service with good attributes.
     * Also contains update response using good attributes.
     * For use with  models without an owner.
     * For models with an owner use $this->returnUpdateResponseWithGoodIdAndGoodAttributesAndGoodOwnerIdBeforeAndAfterUpdate
     * @return array
     */
    public function returnUpdateResponseWithGoodIdAndGoodAttributesBeforeAndAfterUpdate()
    {
        $originalSubjectModel = $this->callServiceStoreMethodWithValidAttributes();

        $subjectModelId = $originalSubjectModel->id;

        $newValidAttributes = $this->getFakeGoodOrBadAttributesForSubjectModelAsArray('good');

        $this->callServiceUpdateMethod($subjectModelId, $newValidAttributes);

        $updatedSubjectModel = $this->callServiceShowMethod($subjectModelId);

        return [ 'before' => $originalSubjectModel, 'after' => $updatedSubjectModel,];
    }


    /**Returns update response for subjectModel as an array with both the original subject model and updated model
     * For use on models with an owner.
     * For models without an owner use $this->returnUpdateResponseWithGoodIdAndGoodAttributesBeforeAndAfterUpdate()
     * @return array
     * @throws \Exception
     */
    public function returnUpdateResponseWithGoodIdAndGoodAttributesAndGoodOwnerIdBeforeAndAfterUpdate()
    {
        $originalSubjectModel = $this->returnStoreResponseWithGoodAttributesThenDestroyOwner();

        $subjectModelId = $originalSubjectModel->id;

        $newValidAttributes = $this->getFakeGoodOrBadAttributesForSubjectModelAsArray('good');

        $updatedSubjectModel = $this->callServiceUpdateMethod($subjectModelId, $newValidAttributes);

        $this->deleteSubjectModelOwnerById($newValidAttributes[$this->getSubjectModelAttributeThatRepresentsOwner()]);

        return ['before' => $originalSubjectModel, 'after' => $updatedSubjectModel];
    }


    public function callServiceStoreMethod($attributes)
    {
        return $this->service->store($attributes);
    }

    public function callServiceStoreMethodWithValidAttributes()
    {
        $goodAttributesForStoreMethod = $this->getFakeGoodOrBadAttributesForSubjectModelAsArray('good');

        return $this->callServiceStoreMethod($goodAttributesForStoreMethod);
    }

    public function callServiceStoreMethodWithBadAttributes()
    {
        $invalidAttributes = $this->getFakeGoodOrBadAttributesForSubjectModelAsArray('bad');

        return $this->callServiceStoreMethod($invalidAttributes);
    }

    public function callServiceShowMethod($subjectModelId)
    {
        return $this->service->show($subjectModelId);
    }

    public function callServiceUpdateMethod($modelId, $newAttributes = array())
    {
        return $this->service->update($modelId, $newAttributes);
    }



}