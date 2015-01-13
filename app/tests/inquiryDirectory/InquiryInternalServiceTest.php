<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/12/15
 * Time: 5:18 PM
 */

namespace tests\inquiryDirectory;


use App\Base\InternalServiceTestAssist;
use App\DomainLogic\InquiryDirectory\InquiryInternalService;

class InquiryInternalServiceTest extends InternalServiceTestAssist {

    /***********************************************************************************************************/
    /*                                        Store Method Tests                                         */
    /***********************************************************************************************************/


    /**
     *Test method creates instance of the correct class.
     */
    public function test_store_method_creates_correct_instance_if_attributes_are_correct()
    {
        $storeResponse = $this->returnStoreResponseWithGoodAttributes();

        $this->assertTrue($this->service->isModelInstance($storeResponse));

        $this->cleanUpSingleModelAfterTesting($storeResponse);
    }

    /**
     *Test method stores instance in database
     */
    public function test_store_method_saves_instance_in_database_if_attributes_are_correct()
    {
        $databaseInstanceAfterStoreResponseCalled = $this->returnDatabaseInstanceAfterStoreMethodCalled();

        $this->assertTrue($this->service->isModelInstance($databaseInstanceAfterStoreResponseCalled));

        $this->cleanUpSingleModelAfterTesting($databaseInstanceAfterStoreResponseCalled);
    }

    /**
     *Test store method returns error message if incorrect attributes used.
     */
    public function test_store_method_returns_error_message_if_attributes_are_invalid()
    {
        $storeResponseUsingBadAttributes = $this->returnStoreResponseWithBadAttributeValues();

        $this->assertEquals('Invalid attributes sent to store method.', $storeResponseUsingBadAttributes);

    }

    /***********************************************************************************************************/
    /*                                        Show Method Tests                                         */
    /***********************************************************************************************************/

    /**
     *Test show method returns instance of correct class.
     */
    public function test_show_method_returns_instance_of_correct_class_if_subjectModel_id_exists()
    {
        $showResponse = $this->returnShowResponseGroupWithGoodIdForSubjectModelWithoutOwner();

        $subjectModelInstance = $showResponse['show'];

        $this->assertTrue($this->service->isModelInstance($subjectModelInstance));

        $this->cleanUpSingleModelAfterTesting($subjectModelInstance);

    }

    /**
     *Test show method returns the same instance that was stored.
     */
    public function test_show_method_returns_correct_instance_if_subjectModel_id_exists()
    {
        $showAndStoreInstances = $this->returnShowResponseGroupWithGoodIdForSubjectModelWithoutOwner();

        $storeInstance = $showAndStoreInstances['store'];

        $showInstance = $showAndStoreInstances['show'];

        $this->assertEquals($showInstance, $storeInstance);

        $this->cleanUpSingleModelAfterTesting($storeInstance);
    }


    /**
     *Test method returns error message when bad id use.
     */
    public function test_show_method_returns_error_message_if_subjectModel_id_does_not_exist()
    {
        $showResponseUsingBadId = $this->returnShowResponseWithBadIdForSubjectModel();

        $this->assertEquals('Model not found.', $showResponseUsingBadId);

    }


    /***********************************************************************************************************/
    /*                                        Update Method Tests                                         */
    /***********************************************************************************************************/


    /**
     *Test update method returns correct class instance
     */
    public function test_update_method_returns_correct_instance_if_subjectModel_id_and_attributes_are_correct()
    {
        $updateResponse = $this->returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithoutOwner();

        $updatedSubjectModel = $updateResponse['after'];

        $this->assertTrue($this->service->isModelInstance($updatedSubjectModel));

        $this->cleanUpSingleModelAfterTesting($updatedSubjectModel);

    }

    /**
     *Test update method returns an updated instance.
     */
    public function test_update_method_returns_updated_instance_if_subjectModel_id_and_attributes_are_correct()
    {
        $updateMethodCallResponse = $this->returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithoutOwner();

        $originalSubjectModel = $updateMethodCallResponse['before'];

        $updatedSubjectModel = $updateMethodCallResponse['after'];

        $this->assertNotEquals($originalSubjectModel->name, $updatedSubjectModel->name);

        $this->cleanUpSingleModelAfterTesting($originalSubjectModel);
    }


    /**
     *Test update method saves changes in database.
     */
    public function test_update_method_saves_changes_in_database_if_subjectModel_id_and_attributes_are_correct()
    {
        $updateMethodCallResponse = $this->returnUpdateResponseGroupUsingGoodIdAndGoodAttributesForSubjectModelWithoutOwner();

        $originalSubjectModel = $updateMethodCallResponse['before'];

        $updatedFromDBSubjectModel = $updateMethodCallResponse['afterFromDB'];

        $this->assertNotEquals($originalSubjectModel->name, $updatedFromDBSubjectModel->name);

        $this->cleanUpSingleModelAfterTesting($originalSubjectModel);

    }

    /**
     *Test update method returns error message if attributes used are invalid.
     */
    public function test_update_method_returns_error_message_if_attributes_are_invalid()
    {
        $updateMethodCallWithBadAttributes = $this->returnUpdateResponseGroupWithBadAttributeValuesForSubjectModelWithoutOwner();

        $this->assertEquals('Invalid attributes sent to update method.', $updateMethodCallWithBadAttributes['call']);

        $this->cleanUpSingleModelAfterTesting($updateMethodCallWithBadAttributes['before']);
    }

    /**
     *Test update method returns error message if bad id is used.
     */
    public function test_update_method_returns_error_message_if_subjectModel_id_does_not_exist()
    {
        $updateMethodCallWithBadId = $this->returnUpdateResponseGroupWithBadIdForSubjectModelWithoutOwner();

        $response = $updateMethodCallWithBadId['call'];

        $subjectModel = $updateMethodCallWithBadId['before'];

        $this->assertEquals('Model not found.', $response);

        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    /***********************************************************************************************************/
    /*                                        Destroy Method Tests                                         */
    /***********************************************************************************************************/

    /**
     *Test destroy method removes instance from database.
     */
    public function test_destroy_method_removes_instance_from_database_if_subjectModel_id_is_correct()
    {
        $destroyMethodCall = $this->returnDestroyResponseGroupForSubjectModelWithoutOwner();

        $subjectModelFromDBAfterDestroyMethodCalled = $destroyMethodCall['afterFromDB'];

        $this->assertEquals(null, $subjectModelFromDBAfterDestroyMethodCalled);

        $subjectModel = $destroyMethodCall['before'];

        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    /**
     *Test destroy method returns error message if bad id is used.
     */
    public function test_destroy_method_returns_error_message_if_subjectModel_id_does_not_exist()
    {
        $destroyMethodCallWithBadSubjectModelID = $this->returnDestroyResponseGroupWithBadIdForSubjectModelWithoutOwner();

        $subjectModel = $destroyMethodCallWithBadSubjectModelID['before'];

        $errorMessage = $destroyMethodCallWithBadSubjectModelID['call'];

        $this->assertEquals('Model not found.', $errorMessage);

        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    /***********************************************************************************************************/
    /*                                        Index Method Tests                                         */
    /***********************************************************************************************************/

    /**
     *Test index method returns correct class instance
     */
    public function test_index_method_returns_correct_class_instances()
    {
        $paginationCount = 6;

        $indexResponse = $this->returnIndexResponseGroupForSubjectModelWithoutOwner($paginationCount);

        $subjectModelToTest = $indexResponse['call'][0];

        $this->assertTrue($this->service->isModelInstance($subjectModelToTest));

        $this->cleanUpMultipleModelsAfterTesting($indexResponse['subjectModels']);
    }

    /**
     *Test index method returns correct quantity of paginated instances.
     */
    public function test_index_method_returns_correct_quantity_of_pagination()
    {
        $paginationCount = 6;

        $indexResponse = $this->returnIndexResponseGroupForSubjectModelWithoutOwner($paginationCount);

        $instancesPerPageReturnedFromIndexMethod = count($indexResponse['call']);

        $this->assertEquals($paginationCount, $instancesPerPageReturnedFromIndexMethod);

        $this->cleanUpMultipleModelsAfterTesting($indexResponse['subjectModels']);
    }


    /***********************************************************************************************************/
    /*                                        Test Properties                                        */
    /***********************************************************************************************************/

    public function __construct()
    {
        $this->service = new InquiryInternalService();
    }
}

