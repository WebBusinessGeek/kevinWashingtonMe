<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/21/15
 * Time: 1:21 PM
 */

namespace tests\imageDirectory;


use App\Base\ExternalServiceTestAssist;
//use App\Controllers\ImageController;

//use App\Controllers\ImageController;

class ImageControllerTest extends ExternalServiceTestAssist {

    public $indexRoute = 'dashboard/image';
    public $indexView = 'image.index';
    public $indexCollectionVariable = 'images';
    public $createRoute = 'dashboard/image/create';
    public $createView = 'image.create';
    public $showRoute = 'dashboard/image';
    public $showView = 'image.show';
    public $showInstanceVariable = 'image';
    public $editRoute = 'dashboard/image/{id}/edit';
    public $editView = 'image.edit';
    public $editInstanceVariable = 'imageForEdit';
    public $storeRoute = 'dashboard/image/';
    public $storeAfterPostView = 'image.show';
    public $updateRoute = 'dashboard/image';
    public $updateAfterPutView = 'image.show';
    public $destroyRoute = 'dashboard/image';
    public $destroyAfterDeleteView = 'image.index';

    public function __construct()
    {
        $this->externalService = new \ImageController();
    }
    /***********************************************************************************************************/
    /*                                          Index method test cases                                               */
    /***********************************************************************************************************/

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerIndexTests
     */
    public function test_index_method_route_is_setup()
    {
        $this->assert_index_method_route_is_setup();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerIndexTests
     */
    public function test_index_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $this->assert_index_method_route_redirects_to_login_if_user_is_not_authenticated();
    }
    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerIndexTests
     */
    public function test_index_method_view_exists()
    {
        $this->assert_index_method_view_exists();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerIndexTests
     */
    public function test_index_method_view_contains_paginated_variable_instance()
    {
        $this->assert_index_method_view_contains_paginated_variable_instance();
    }



    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerIndexTests
     */
    public function test_cleanup_files_after_index_method_testcases()
    {
        $this->clean_files_from_all_directories($this->imageTestingDirectories);
    }
    /***********************************************************************************************************/
    /*                                          Create method test cases                                              */
    /***********************************************************************************************************/

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerCreateTests
     */
    public function test_create_method_route_is_setup()
    {
        $this->assert_create_method_route_is_setup();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerCreateTests
     */
    public function test_create_method_view_exists()
    {
        $this->assert_create_method_view_exists();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerCreateTests
     */
    public function test_create_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $this->assert_create_method_route_redirects_to_login_if_user_is_not_authenticated();
    }


    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerCreateTests
     */
    public function test_cleanup_files_after_create_method_testcases()
    {
        $this->clean_files_from_all_directories($this->imageTestingDirectories);
    }
    /***********************************************************************************************************/
    /*                                          Show method test cases                                              */
    /***********************************************************************************************************/

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerShowTests
     */
    public function test_show_method_route_is_setup()
    {
        $this->assert_show_method_route_is_setup();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerShowTests
     */
    public function test_show_method_view_exists()
    {
        $this->assert_show_method_view_exists();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerShowTests
     */
    public function test_show_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $this->assert_show_method_redirects_to_login_if_user_is_not_authenticated();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerShowTests
     */
    public function test_show_method_view_contains_variable_instance_of_correct_class()
    {
        $this->assert_show_method_view_contains_variable_instance_of_correct_class();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerShowTests
     */
    public function test_show_method_view_returns_correct_instance()
    {
        $this->assert_show_method_view_returns_correct_instance();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerShowTests
     */
    public function test_show_method_redirects_to_index_route_on_bad_id_error()
    {
        $this->assert_show_method_redirects_to_index_route_on_bad_id_error();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerShowTests
     */
    public function test_show_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->assert_show_method_redirects_with_correct_error_message_on_bad_id_error();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerShowTests
     */
    public function test_cleanup_files_after_show_method_testcases()
    {
        $this->clean_files_from_all_directories($this->imageTestingDirectories);
    }

    /***********************************************************************************************************/
    /*                                          Edit method test cases                                              */
    /***********************************************************************************************************/

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerEditTests
     */
    public function test_edit_method_route_is_setup()
    {
        $this->assert_edit_method_route_is_setup();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerEditTests
     */
    public function test_edit_method_view_exists()
    {
        $this->assert_edit_method_view_exists();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerEditTests
     */
    public function test_edit_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $this->assert_edit_method_redirects_to_login_if_user_is_not_authenticated();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerEditTests
     */
    public function test_edit_method_redirects_to_index_on_bad_id_error()
    {
        $this->assert_edit_method_redirects_to_index_on_bad_id_error();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerEditTests
     */
    public function test_edit_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->assert_edit_method_redirects_with_correct_error_message_on_bad_id_error();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerEditTests
     */
    public function test_edit_method_view_contains_instance_of_correct_class()
    {
        $this->assert_edit_method_view_contains_instance_of_correct_class();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerEditTests
     */
    public function test_edit_method_view_contains_correct_subjectModel_instance()
    {
        $this->assert_edit_method_view_contains_correct_subjectModel_instance();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerEditTests
     */
    public function test_cleanup_files_after_edit_method_testcases()
    {
        $this->clean_files_from_all_directories($this->imageTestingDirectories);
    }
    /***********************************************************************************************************/
    /*                                          Store method test cases                                              */
    /***********************************************************************************************************/

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerStoreTests
     */
    public function test_store_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $this->assert_store_method_redirects_to_login_if_user_is_not_authenticated();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerStoreTests
     */
    public function test_store_method_after_post_view_exists()
    {
        $this->assert_store_method_after_post_view_exists();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerStoreTests
     */
    public function test_store_method_redirects_to_correct_route_on_success()
    {
        $this->assert_store_method_redirects_to_correct_route_on_success();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerStoreTests
     */
    public function test_store_method_redirects_to_create_route_on_bad_attributes_error()
    {
        $this->assert_store_method_redirects_to_create_route_on_bad_attributes_error();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerStoreTests
     */
    public function test_store_method_view_has_correct_error_message_on_bad_attributes_error()
    {
        $this->assert_store_method_view_has_correct_error_message_on_bad_attributes_error();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerStoreTests
     */
    public function test_cleanup_files_after_store_method_testcases()
    {
        $this->clean_files_from_all_directories($this->imageTestingDirectories);
    }


    /***********************************************************************************************************/
    /*                                          Update method test cases                                         */
    /***********************************************************************************************************/

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerUpdateTests
     */
    public function test_update_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
//        $this->assert_update_method_route_redirects_to_login_if_user_is_not_authenticated();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerUpdateTests
     */
    public function test_update_method_after_put_view_exists()
    {
//        $this->assert_update_method_after_put_view_exists();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerUpdateTests
     */
    public function test_update_method_redirects_to_show_route_on_success()
    {
//        $this->assert_update_method_redirects_to_show_route_on_success();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerUpdateTests
     */
    public function test_update_method_redirects_with_correct_instance_on_success()
    {
//        $this->assert_update_method_redirects_with_correct_instance_on_success();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerUpdateTests
     */
    public function test_update_method_redirects_to_edit_route_on_bad_attributes_error()
    {
//        $this->assert_update_method_redirects_to_edit_route_on_bad_attributes_error();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerUpdateTests
     */
    public function test_update_method_redirects_with_correct_error_message_on_bad_attributes_error()
    {
//        $this->assert_update_method_redirects_with_correct_error_message_on_bad_attributes_error();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerUpdateTests
     */
    public function test_update_method_redirects_to_index_route_on_bad_id_error()
    {
//        $this->assert_update_method_redirects_to_index_route_on_bad_id_error();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerUpdateTests
     */
    public function test_update_method_redirects_with_correct_error_message_on_bad_id_error()
    {
//        $this->assert_update_method_redirects_with_correct_error_message_on_bad_id_error();
    }


    /***********************************************************************************************************/
    /*                                          Destroy method test cases                                         */
    /***********************************************************************************************************/

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerDestroyTests
     */
    public function test_destroy_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $this->assert_destroy_method_route_redirects_to_login_if_user_is_not_authenticated();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerDestroyTests
     */
    public function test_destroy_method_after_delete_view_exists()
    {
        $this->assert_destroy_method_after_delete_view_exists();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerDestroyTests
     */
    public function test_destroy_method_correct_instance_is_deleted()
    {
//        $this->assert_destroy_method_correct_instance_is_deleted();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerDestroyTests
     */
    public function test_destroy_method_redirects_to_index_route_on_success()
    {
//        $this->assert_destroy_method_redirects_to_index_route_on_success();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerDestroyTests
     */
    public function test_destroy_method_redirects_with_correct_message_on_success()
    {
//        $this->assert_destroy_method_redirects_with_correct_message_on_success();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerDestroyTests
     */
    public function test_destroy_method_redirects_to_index_route_on_bad_id_error()
    {
        $this->assert_destroy_method_redirects_to_index_route_on_bad_id_error();
    }

    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerDestroyTests
     */
    public function test_destroy_method_redirects_with_correct_message_on_bad_id_error()
    {
        $this->assert_destroy_method_redirects_with_correct_message_on_bad_id_error();
    }


    /**
     * @group imageGlobalTests
     * @group controllerTests
     * @group imageControllerTests
     * @group imageControllerDestroyTests
     */
    public function test_cleanup_files_after_destroy_method_testcases()
    {
        $this->clean_files_from_all_directories($this->imageTestingDirectories);
    }
}

