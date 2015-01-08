<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 7:47 PM
 */

namespace tests\skillDirectory;


use App\Base\InternalServiceTestAssist;
use App\DomainLogic\SkillDirectory\SkillInternalService;
use Illuminate\Foundation\Testing\TestCase;

class SkillInternalServiceTest extends InternalServiceTestAssist{


    /***********************************************************************************************************/
    /*                                          Store method tests                                              */
    /***********************************************************************************************************/


    public function test_store_method_creates_correct_instance_if_attributes_are_correct()
    {
        // TODO: Implement test_store_method_creates_correct_instance_if_attributes_are_correct() method.
    }

    public function test_store_method_saves_instance_in_database_if_attributes_are_correct()
    {
        // TODO: Implement test_store_method_saves_instance_in_database_if_attributes_are_correct() method.
    }

    public function test_store_method_returns_error_message_if_attributes_are_invalid()
    {
        // TODO: Implement test_store_method_returns_error_message_if_attributes_are_invalid() method.
    }


    /***********************************************************************************************************/
    /*                                          Show method tests                                              */
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
    /*                                          Update method tests                                              */
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
    /*                                          Update method tests                                              */
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
    /*                                          Test helper properties                                            */
    /***********************************************************************************************************/

    public $service;

    public function __construct()
    {
        $this->service = new SkillInternalService();
    }


}

