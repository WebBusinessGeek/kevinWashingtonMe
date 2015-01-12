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

        //assert database instance from database is correct class
        $this->assertTrue($this->service->isModelInstance($databaseInstanceAfterStoreResponseCalled));

        //cleanup
        $this->cleanUpSingleModelAfterTesting($databaseInstanceAfterStoreResponseCalled);
    }

    /**
     *Test store method returns error message if incorrect attributes used.
     */
    public function test_store_method_returns_error_message_if_attributes_are_invalid()
    {
        //get bad attribute call for store
        $storeResponseUsingBadAttributes = $this->returnStoreResponseWithBadAttributeValues();

        //assert error message
        $this->assertEquals('Invalid attributes sent to store method.', $storeResponseUsingBadAttributes);
        
    }

    /***********************************************************************************************************/
    /*                                        Show Method Tests                                         */
    /***********************************************************************************************************/

    public function test_show_method_returns_instance_of_correct_class_if_subjectModel_id_exists()
    {
        // TODO: Implement test_show_method_returns_instance_of_correct_class_if_subjectModel_id_exists() method.
    }

    public function test_show_method_returns_correct_instance_if_subjectModel_id_exists()
    {
        // TODO: Implement test_show_method_returns_correct_instance_if_subjectModel_id_exists() method.
    }

    public function test_show_method_returns_error_message_if_subjectModel_id_does_not_exist()
    {
        // TODO: Implement test_show_method_returns_error_message_if_subjectModel_id_does_not_exist() method.
    }


    /***********************************************************************************************************/
    /*                                        Update Method Tests                                         */
    /***********************************************************************************************************/


    public function test_update_method_returns_correct_instance_if_subjectModel_id_and_attributes_are_correct()
    {
        // TODO: Implement test_update_method_returns_correct_instance_if_subjectModel_id_and_attributes_are_correct() method.
    }

    public function test_update_method_returns_updated_instance_if_subjectModel_id_and_attributes_are_correct()
    {
        // TODO: Implement test_update_method_returns_updated_instance_if_subjectModel_id_and_attributes_are_correct() method.
    }

    public function test_update_method_saves_changes_in_database_if_subjectModel_id_and_attributes_are_correct()
    {
        // TODO: Implement test_update_method_saves_changes_in_database_if_subjectModel_id_and_attributes_are_correct() method.
    }

    public function test_update_method_returns_error_message_if_attributes_are_invalid()
    {
        // TODO: Implement test_update_method_returns_error_message_if_attributes_are_invalid() method.
    }

    public function test_update_method_returns_error_message_if_subjectModel_id_does_not_exist()
    {
        // TODO: Implement test_update_method_returns_error_message_if_subjectModel_id_does_not_exist() method.
    }

    /***********************************************************************************************************/
    /*                                        Destroy Method Tests                                         */
    /***********************************************************************************************************/

    public function test_destroy_method_removes_instance_from_database_if_subjectModel_id_is_correct()
    {
        // TODO: Implement test_destroy_method_removes_instance_from_database_if_subjectModel_id_is_correct() method.
    }

    public function test_destroy_method_returns_error_message_if_subjectModel_id_does_not_exist()
    {
        // TODO: Implement test_destroy_method_returns_error_message_if_subjectModel_id_does_not_exist() method.
    }

    /***********************************************************************************************************/
    /*                                        Index Method Tests                                         */
    /***********************************************************************************************************/

    public function test_index_method_returns_correct_class_instances()
    {
        // TODO: Implement test_index_method_returns_correct_class_instances() method.
    }

    public function test_index_method_returns_correct_quantity_of_pagination()
    {
        // TODO: Implement test_index_method_returns_correct_quantity_of_pagination() method.
    }


    /***********************************************************************************************************/
    /*                                        Test Properties                                        */
    /***********************************************************************************************************/

    public function __construct()
    {
        $this->service = new InquiryInternalService();
    }
}

