<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/20/15
 * Time: 8:13 PM
 */

namespace tests\skillDirectory;


use App\Base\ExternalServiceTestAssist;

class SkillControllerTest extends ExternalServiceTestAssist {

    public $indexRoute = 'dashboard/skill';
    public $indexView = 'skill.index';
    public $indexCollectionVariable = 'skills';
    public $createRoute = 'dashboard/skill/create';
    public $createView = 'skill.create';
    public $showRoute = 'dashboard/skill';
    public $showView = 'skill.show';
    public $showInstanceVariable = 'skill';
    public $editRoute = 'dashboard/skill/{id}/edit';
    public $editView = 'skill.edit';
    public $editInstanceVariable = 'skillForEdit';
    public $storeRoute = 'dashboard/skill/';
    public $storeAfterPostView = 'skill.show';
    public $updateRoute = 'dashboard/skill';
    public $updateAfterPutView = 'skill.show';
    public $destroyRoute = 'dashboard/skill';
    public $destroyAfterDeleteView = 'skill.index';

    public function __construct()
    {
        $this->externalService = new \SkillController();
    }
    /***********************************************************************************************************/
    /*                                          Index method test cases                                               */
    /***********************************************************************************************************/

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerIndexTests
     */
    public function test_index_method_route_is_setup()
    {
        $this->assert_index_method_route_is_setup();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerIndexTests
     */
    public function test_index_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $this->assert_index_method_route_redirects_to_login_if_user_is_not_authenticated();
    }
    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerIndexTests
     */
    public function test_index_method_view_exists()
    {
        $this->assert_index_method_view_exists();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerIndexTests
     */
    public function test_index_method_view_contains_paginated_variable_instance()
    {
        $this->assert_index_method_view_contains_paginated_variable_instance();
    }
    /***********************************************************************************************************/
    /*                                          Create method test cases                                              */
    /***********************************************************************************************************/

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerCreateTests
     */
    public function test_create_method_route_is_setup()
    {
        $this->assert_create_method_route_is_setup();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerCreateTests
     */
    public function test_create_method_view_exists()
    {
        $this->assert_create_method_view_exists();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerCreateTests
     */
    public function test_create_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $this->assert_create_method_route_redirects_to_login_if_user_is_not_authenticated();
    }

    /***********************************************************************************************************/
    /*                                          Show method test cases                                              */
    /***********************************************************************************************************/

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerShowTests
     */
    public function test_show_method_route_is_setup()
    {
        $this->assert_show_method_route_is_setup();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerShowTests
     */
    public function test_show_method_view_exists()
    {
        $this->assert_show_method_view_exists();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerShowTests
     */
    public function test_show_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $this->assert_show_method_redirects_to_login_if_user_is_not_authenticated();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerShowTests
     */
    public function test_show_method_view_contains_variable_instance_of_correct_class()
    {
        $this->assert_show_method_view_contains_variable_instance_of_correct_class();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerShowTests
     */
    public function test_show_method_view_returns_correct_instance()
    {
        $this->assert_show_method_view_returns_correct_instance();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerShowTests
     */
    public function test_show_method_redirects_to_index_route_on_bad_id_error()
    {
        $this->assert_show_method_redirects_to_index_route_on_bad_id_error();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerShowTests
     */
    public function test_show_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->assert_show_method_redirects_with_correct_error_message_on_bad_id_error();
    }

    /***********************************************************************************************************/
    /*                                          Edit method test cases                                              */
    /***********************************************************************************************************/

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerEditTests
     */
    public function test_edit_method_route_is_setup()
    {
        $this->assert_edit_method_route_is_setup();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerEditTests
     */
    public function test_edit_method_view_exists()
    {
        $this->assert_edit_method_view_exists();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerEditTests
     */
    public function test_edit_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $this->assert_edit_method_redirects_to_login_if_user_is_not_authenticated();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerEditTests
     */
    public function test_edit_method_redirects_to_index_on_bad_id_error()
    {
        $this->assert_edit_method_redirects_to_index_on_bad_id_error();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerEditTests
     */
    public function test_edit_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->assert_edit_method_redirects_with_correct_error_message_on_bad_id_error();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerEditTests
     */
    public function test_edit_method_view_contains_instance_of_correct_class()
    {
        $this->assert_edit_method_view_contains_instance_of_correct_class();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerEditTests
     */
    public function test_edit_method_view_contains_correct_subjectModel_instance()
    {
        $this->assert_edit_method_view_contains_correct_subjectModel_instance();
    }

    /***********************************************************************************************************/
    /*                                          Store method test cases                                              */
    /***********************************************************************************************************/

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerStoreTests
     */
    public function test_store_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $this->assert_store_method_redirects_to_login_if_user_is_not_authenticated();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerStoreTests
     */
    public function test_store_method_after_post_view_exists()
    {
        $this->assert_store_method_after_post_view_exists();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerStoreTests
     */
    public function test_store_method_redirects_to_correct_route_on_success()
    {
        $this->assert_store_method_redirects_to_correct_route_on_success();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerStoreTests
     */
    public function test_store_method_redirects_to_create_route_on_bad_attributes_error()
    {
        $this->assert_store_method_redirects_to_create_route_on_bad_attributes_error();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerStoreTests
     */
    public function test_store_method_view_has_correct_error_message_on_bad_attributes_error()
    {
        $this->assert_store_method_view_has_correct_error_message_on_bad_attributes_error();
    }


    /***********************************************************************************************************/
    /*                                          Update method test cases                                         */
    /***********************************************************************************************************/

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerUpdateTests
     */
    public function test_update_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $this->assert_update_method_route_redirects_to_login_if_user_is_not_authenticated();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerUpdateTests
     */
    public function test_update_method_after_put_view_exists()
    {
        $this->assert_update_method_after_put_view_exists();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerUpdateTests
     */
    public function test_update_method_redirects_to_show_route_on_success()
    {
        $this->assert_update_method_redirects_to_show_route_on_success();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerUpdateTests
     */
    public function test_update_method_redirects_with_correct_instance_on_success()
    {
        $this->assert_update_method_redirects_with_correct_instance_on_success();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerUpdateTests
     */
    public function test_update_method_redirects_to_edit_route_on_bad_attributes_error()
    {
        $this->assert_update_method_redirects_to_edit_route_on_bad_attributes_error();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerUpdateTests
     */
    public function test_update_method_redirects_with_correct_error_message_on_bad_attributes_error()
    {
        $this->assert_update_method_redirects_with_correct_error_message_on_bad_attributes_error();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerUpdateTests
     */
    public function test_update_method_redirects_to_index_route_on_bad_id_error()
    {
        $this->assert_update_method_redirects_to_index_route_on_bad_id_error();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerUpdateTests
     */
    public function test_update_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->assert_update_method_redirects_with_correct_error_message_on_bad_id_error();
    }


    /***********************************************************************************************************/
    /*                                          Destroy method test cases                                         */
    /***********************************************************************************************************/

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerDestroyTests
     */
    public function test_destroy_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $this->assert_destroy_method_route_redirects_to_login_if_user_is_not_authenticated();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerDestroyTests
     */
    public function test_destroy_method_after_delete_view_exists()
    {
        $this->assert_destroy_method_after_delete_view_exists();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerDestroyTests
     */
    public function test_destroy_method_correct_instance_is_deleted()
    {
        $this->assert_destroy_method_correct_instance_is_deleted();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerDestroyTests
     */
    public function test_destroy_method_redirects_to_index_route_on_success()
    {
        $this->assert_destroy_method_redirects_to_index_route_on_success();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerDestroyTests
     */
    public function test_destroy_method_redirects_with_correct_message_on_success()
    {
        $this->assert_destroy_method_redirects_with_correct_message_on_success();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerDestroyTests
     */
    public function test_destroy_method_redirects_to_index_route_on_bad_id_error()
    {
        $this->assert_destroy_method_redirects_to_index_route_on_bad_id_error();
    }

    /**
     * @group controllerTests
     * @group skillControllerTests
     * @group skillControllerDestroyTests
     */
    public function test_destroy_method_redirects_with_correct_message_on_bad_id_error()
    {
        $this->assert_destroy_method_redirects_with_correct_message_on_bad_id_error();
    }
}

