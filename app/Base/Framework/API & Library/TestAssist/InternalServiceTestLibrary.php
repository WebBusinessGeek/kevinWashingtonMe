<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 11:58 PM
 */

namespace App\Base;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\TestCase;
use Symfony\Component\Routing\Exception\MissingMandatoryParametersException;

abstract class InternalServiceTestLibrary extends \TestCase{

    public $service;

    /***********************************************************************************************************/
    /*                                          Test Streamlining                                             */
    /***********************************************************************************************************/


    /**Returns a modelInternalService@store method call response with good attributes.
     * For use on models without an owner.
     * For models with an owner use $this->returnStoreResponseWithGoodAttributesThenDestroyOwner() or you will have unwanted dummy data in the owner's database table.
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
     * For models with an owner use $this->returnDatabaseInstanceAfterStoreMethodCalledThenDestroyOwner() or you will have unwanted dummy data in the owner's database table.
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

        $goodAttributesWithBadOwnerId = $this->exchangeGoodOwnerIdWithBadIdAndDestroyMockedOwner($goodAttributes);

        return $this->callServiceStoreMethod($goodAttributesWithBadOwnerId);
    }


    /**Returns show method response for subjectModel service using a good id.
     * For use on models without an owner.
     * For models with an owner use $this->returnShowResponseWithGoodIdForSubjectModelWithOwner() or you will have unwanted dummy data in the owner's database table.
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
     * For models with an owner you should use $this->returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithOwner() or you will have unwanted dummy data in the owner's database table.
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


    /**Returns an array of the subjectModel before the update method was called, and the response of the update method when bad attributes are used.
     *Returns before, and after instances
     *For use on models without an owner
     *For models with an owner you should use $this->returnUpdateResponseGroupWithBadAttributeNamesForSubjectModelWithOwner() or you will have unwanted dummy data in the owner's database table.
     * @return array
     */
    public function returnUpdateResponseGroupWithBadAttributeValuesForSubjectModelWithoutOwner()
    {
        $originalSubjectModel = $this->callServiceStoreMethodWithValidAttributes();

        $subjectModelId = $originalSubjectModel->id;

        $badAttributes = $this->getFakeGoodOrBadAttributesForSubjectModelAsArray('bad');

        $badUpdateCall = $this->callServiceUpdateMethod($subjectModelId,$badAttributes);

        return ['before' => $originalSubjectModel, 'after' => $badUpdateCall];
    }


    /**Returns an array of the subjectModel before the update method was called, and the response of the update method with bad attributes.
     * Returns before, and after instances.
     * For use on models with an owner
     * For models without an owner you should use $this->returnUpdateResponseGroupWithBadAttributeNamesForSubjectModelWithoutOwner()
     * @return array
     */
    public function returnUpdateResponseGroupWithBadAttributeValuesForSubjectModelWithOwner()
    {
        $originalSubjectModel = $this->returnStoreResponseWithGoodAttributesThenDestroyOwner();

        $subjectModelId = $originalSubjectModel->id;

        $badAttributes = $this->getFakeGoodOrBadAttributesForSubjectModelAsArray('bad');

        $badUpdateCall = $this->callServiceUpdateMethod($subjectModelId, $badAttributes);

        return ['before' => $originalSubjectModel, 'after' => $badUpdateCall];
    }


    /**Returns an array of the subjectModel before the update method was called, and the response of the update method with good attributes, but a bad owner id.
     * Returns before, and after instances.
     * For use on models with an owner.
     * No alternative available as models without an owner should not need this functionality.
     * @return array
     */
    public function returnUpdateResponseGroupWithGoodAttributesButBadOwnerId()
    {
        $originalSubjectModel = $this->returnStoreResponseWithGoodAttributesThenDestroyOwner();

        $subjectModelId = $originalSubjectModel->id;

        $newValidAttributes = $this->getFakeGoodOrBadAttributesForSubjectModelAsArray('good');

        $goodAttributesWithBadOwnerId = $this->exchangeGoodOwnerIdWithBadIdAndDestroyMockedOwner($newValidAttributes);

        $badUpdateCall = $this->callServiceUpdateMethod($subjectModelId, $goodAttributesWithBadOwnerId);

        return ['before' => $originalSubjectModel, 'after' => $badUpdateCall];
    }


    /**Returns an array of the subjectModel before the update method was called, and the response of the update method when a bad id for the model is used.
     *Returns before, and after instances
     *For use on models without an owner
     *For models with an owner you should use $this->returnUpdateResponseGroupWithBadIdForSubjectModelWithOwner() or you will have unwanted dummy data in the owner's database table.
     * @return array
     */
    public function returnUpdateResponseGroupWithBadIdForSubjectModelWithoutOwner()
    {
        $originalModel = $this->callServiceStoreMethodWithValidAttributes();

        $newValidAttributes = $this->getFakeGoodOrBadAttributesForSubjectModelAsArray('good');

        $badIdForSubjectModel = $this->getBadIdForSubjectModel();

        $badUpdateCall = $this->callServiceUpdateMethod($badIdForSubjectModel, $newValidAttributes);

        return ['before' => $originalModel, 'after' => $badUpdateCall];
    }


    /**Returns an array of the subjectModel before the update method was called, and the response of the update method with a bad id for the model.
     * Returns before, and after instances.
     * For use on models with an owner
     * For models without an owner you should use $this->returnUpdateResponseGroupWithBadIdForSubjectModelWithoutOwner()
     * @return array
     */
    public function returnUpdateResponseGroupWithBadIdForSubjectModelWithOwner()
    {
        $originalModel = $this->returnStoreResponseWithGoodAttributesThenDestroyOwner();

        $newValidAttributes = $this->getFakeGoodOrBadAttributesForSubjectModelAsArray('good');

        $badIdForSubjectModel = $this->getBadIdForSubjectModel();

        $badUpdateCall = $this->callServiceUpdateMethod($badIdForSubjectModel, $newValidAttributes);

        $attributeThatRepresentsOwner = $this->getSubjectModelAttributeThatRepresentsOwner();

        $this->deleteSubjectModelOwnerById($newValidAttributes[$attributeThatRepresentsOwner]);

        return ['before' => $originalModel, 'after' => $badUpdateCall];
    }


    /**Returns an array of the subjectModel, the destroy call response, and the subjectModel instance from the database after the destroy call was made.
     * Returns before, afterFromDB, and call instances.
     * For use on models without an owner.
     * For models with an owner you should use $this->returnDestroyResponseGroupForSubjectModelWithOwner() or you will have unwanted dummy data in the owner's database table.
     * @return array
     */
    public function returnDestroyResponseGroupForSubjectModelWithoutOwner()
    {
        $subjectModel = $this->callServiceStoreMethodWithValidAttributes();

        $subjectModelId = $subjectModel->id;

        $destroyCallResponse = $this->callServiceDestroyMethod($subjectModelId);

        $subjectModelFromDBAfterDestroyCall = $this->getSubjectModelFromDatabase($subjectModelId);

        return ['before' => $subjectModel, 'afterFromDB' => $subjectModelFromDBAfterDestroyCall, 'call' => $destroyCallResponse];
    }


    /**Returns an array of the subjectModel, the destroy call response, and the subjectModel instance from the database after the destroy call was made.
     * Returns before, afterFromDB, and call instances.
     * For use on models with an owner.
     * For models without an owner you should use $this->returnDestroyResponseGroupForSubjectModelWithoutOwner()
     * @return array
     */
    public function returnDestroyResponseGroupForSubjectModelWithOwner()
    {
        $subjectModel = $this->returnStoreResponseWithGoodAttributesThenDestroyOwner();

        $subjectModelId = $subjectModel->id;

        $destroyCallResponse = $this->callServiceDestroyMethod($subjectModelId);

        $subjectModelFromDBAfterDestroyCall = $this->getSubjectModelFromDatabase($subjectModelId);

        return ['before' => $subjectModel, 'afterFromDB' => $subjectModelFromDBAfterDestroyCall, 'call' =>  $destroyCallResponse];
    }


    /**Returns an array of the subjectModel, the destroy method call with a bad id, and the database instance of the subject model after the call.
     * Returns before, afterFromDB, and call instances
     * For use with models without an owner.
     * For models with an owner you should use $this->returnDestroyResponseGroupWithBAdIdForSubjectModelWithOwner() or you will have unwanted dummy data in the owner's database table.
     * @return array
     */
    public function returnDestroyResponseGroupWithBadIdForSubjectModelWithoutOwner()
    {
        $subjectModel = $this->callServiceStoreMethodWithValidAttributes();

        $subjectModelId = $subjectModel->id;

        $badSubjectModelId = $this->getBadIdForSubjectModel();

        $badDestroyCallResponse = $this->callServiceDestroyMethod($badSubjectModelId);

        $subjectModelFromDBAfterBadDestroyCall = $this->getSubjectModelFromDatabase($subjectModelId);

        return ['before' => $subjectModel, 'afterFromDB' => $subjectModelFromDBAfterBadDestroyCall, 'call' => $badDestroyCallResponse];
    }


    /**Returns an array of the subjectModel, response from destroy method call with bad id, and model instance from database after the bad destroy call.
     * Returns before, afterFromDB, and call instances.
     * For use with models with an owner.
     * For models without an owner you should use returnDestroyResponseGroupWithBadIdForSubjectModelWithoutOwner()
     * @return array
     */
    public function returnDestroyResponseGroupWithBadIdForSubjectModelWithOwner()
    {
        $subjectModel = $this->returnStoreResponseWithGoodAttributesThenDestroyOwner();

        $goodSubjectModelId = $subjectModel->id;

        $badSubjectModelId = $this->getBadIdForSubjectModel();

        $badDestroyCallResponse = $this->callServiceDestroyMethod($badSubjectModelId);

        $subjectModelFromDBAfterBadDestroyCall = $this->getSubjectModelFromDatabase($goodSubjectModelId);

        return ['before' => $subjectModel, 'afterFromDB' => $subjectModelFromDBAfterBadDestroyCall, 'call' =>  $badDestroyCallResponse];
    }


    /**Returns response after making an index method call on subjectModel's service. Also creates and returns dummy subjectModel in case there are no seeds in database.
     * Returns subjectModels, and call instances.
     * For use on models without an owner.
     * For models with an owner you should use returnIndexResponseGroupForSubjectModelWithOwner() or you will have unwanted dummy data in the owner's database table.
     * @param $paginationCount
     * @return array
     */
    public function returnIndexResponseGroupForSubjectModelWithoutOwner($paginationCount)
    {
        $amountOfSubjectModelsToCreate = 20;

        $subjectModels = $this->createMultipleSubjectModelInstancesWithoutOwners($amountOfSubjectModelsToCreate);

        $indexCallResponse = $this->callServiceIndexMethod($paginationCount);

        return ['subjectModels' => $subjectModels, 'call' => $indexCallResponse];
    }

    /**Returns response after making an index method call on subjectModel's service. Also creates and returns dummy subjectModel in case there are no seeds in database.
     * Returns subjectModels, and call instances.
     * For use on models with an owner.
     * For models without an owner you should use returnIndexResponseGroupForSubjectModelWithoutOwner() or you will cause errors.
     * @param $paginationCount
     * @return array
     */
    public function returnIndexResponseGroupForSubjectModelWithOwner($paginationCount)
    {
        $amountOfSubjectModelsToCreate = 20;

        $subjectModels = $this->createMultipleSubjectModelInstancesWithOwners($amountOfSubjectModelsToCreate);

        $indexCallResponse =  $this->callServiceIndexMethod($paginationCount);

        return ['subjectModels' => $subjectModels, 'call' => $indexCallResponse];
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

    public function getBadIdForSubjectModel()
    {
        return 'aaa';
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


    public function generateRandomIntegers()
    {
        return md5(rand(1209382, 102938102938109238));
    }

    public function fakeGoodEmailAttribute()
    {
        return 'FakeGoodEmailAttribute'.$this->generateRandomIntegers().'@myFramework.com';
    }

    public function fakeGoodUrlAttribute()
    {
        return 'http://www.fakeURLFromMyFramework'.$this->generateRandomIntegers().'.com';
    }

    public function fakeGoodPasswordAttribute()
    {
        return 'testtest'.$this->generateRandomIntegers().'FromMyFramework';
    }

    public function fakeGoodStringAttribute()
    {
        return 'FakeGoodString'.$this->generateRandomIntegers().'FromMyFrameWork';
    }

    public function fakeGoodExistsAttribute()
    {
        $ownerClassName = $this->getSubjectModelSingleOwnerClassName();

        return $ownerClassName::create([''])->id;
    }

    public function fakeGoodTextAttribute()
    {
        $text = 'FakeGoodText'.$this->generateRandomIntegers().'FromMyFramework'.'<br/>'.'FakeGoodText'.md5(rand(1209382, 102938102938109238)).'FromMyFramework'.'<br/>'.'FakeGoodText'.md5(rand(1209382, 102938102938109238)).'FromMyFramework'.'<br/>';
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

    public function cleanUpAfterTesting(Model $model)
    {
        $subjectModelId =  $model->id;
        $className = $this->getSubjectModelClassName();
        $className::destroy($subjectModelId);
    }


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

    public function createMultipleSubjectModelInstancesWithoutOwners($amountOfSubjectModels)
    {
        $subjectModels = [];

        foreach(range(1, $amountOfSubjectModels) as $index)
        {
            $subjectModel = $this->callServiceStoreMethodWithValidAttributes();
            array_push($subjectModels, $subjectModel);
        }

        return $subjectModels;
    }

    public function createMultipleSubjectModelInstancesWithOwners($amountOfSubjectModelsToCreate)
    {
        $subjectModels = [];

        foreach(range(1, $amountOfSubjectModelsToCreate) as $index)
        {
            $subjectModel = $this->returnStoreResponseWithGoodAttributesThenDestroyOwner();
            array_push($subjectModels, $subjectModel);
        }
        return $subjectModels;
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

    public function exchangeGoodOwnerIdWithBadIdAndDestroyMockedOwner($attributesToChange)
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


    public function callServiceDestroyMethod($modelId)
    {
        return $this->service->destroy($modelId);
    }


    public function callServiceIndexMethod($paginationCount)
    {
        return $this->service->index($paginationCount);
    }
}