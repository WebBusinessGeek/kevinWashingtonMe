<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 10:42 PM
 */

namespace App\Base;


use Illuminate\Foundation\Testing\TestCase;
use Symfony\Component\Routing\Exception\MissingMandatoryParametersException;

abstract class InternalServiceTestAssist extends InternalServiceTestLibrary {

    /***********************************************************************************************************/
    /*                                        *** Setup Enforcement on Descendants ***                            */
    /***********************************************************************************************************/

    public function __construct()
    {
        if($this->service == null)
        {
            throw new MissingMandatoryParametersException('No service added to test\'s constructor! Add a service before running tests!');
        }
    }

    /***********************************************************************************************************/
    /*                                     *** TestCase Enforcement on Descendants ***                             */
    /***********************************************************************************************************/
    /***********************************************************************************************************/
    /*                                                  Store TestCases                                       */
    /***********************************************************************************************************/

    abstract public function test_store_method_creates_correct_instance_if_attributes_are_correct();

    abstract public function test_store_method_saves_instance_in_database_if_attributes_are_correct();

    abstract public function test_store_method_returns_error_message_if_attributes_are_invalid();

//    abstract public function test_store_method_returns_error_message_if_owner_doesnt_exist();

    /***********************************************************************************************************/
    /*                                                  Show TestCases                                       */
    /***********************************************************************************************************/

    abstract public function test_show_method_returns_instance_of_correct_class_if_subjectModel_id_exists();

    abstract public function test_show_method_returns_correct_instance_if_subjectModel_id_exists();

    abstract public function test_show_method_returns_error_message_if_subjectModel_id_does_not_exist();

//    abstract public function test_show_method_returns_instance_with_its_relationships();


    /***********************************************************************************************************/
    /*                                                  Update TestCases                                       */
    /***********************************************************************************************************/

    abstract public function test_update_method_returns_correct_instance_if_subjectModel_id_and_attributes_are_correct();

    abstract public function test_update_method_returns_updated_instance_if_subjectModel_id_and_attributes_are_correct();

    abstract public function test_update_method_saves_changes_in_database_if_subjectModel_id_and_attributes_are_correct();

    abstract public function test_update_method_returns_error_message_if_attributes_are_invalid();

//    abstract public function test_update_method_returns_error_message_if_owner_doesnt_exist();

    abstract public function test_update_method_returns_error_message_if_subjectModel_id_does_not_exist();


    /***********************************************************************************************************/
    /*                                                  Destroy TestCases                                       */
    /***********************************************************************************************************/

    abstract public function test_destroy_method_removes_instance_from_database_if_subjectModel_id_is_correct();

    abstract public function test_destroy_method_returns_error_message_if_subjectModel_id_does_not_exist();

//    abstract public function test_update_method_deletes_relationships();


  }