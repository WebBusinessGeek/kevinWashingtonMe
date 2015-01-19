<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/15/15
 * Time: 11:48 AM
 */

namespace App\Base;


abstract class ExternalServiceTestAssist extends ExternalServiceTestLibrary {


    /***********************************************************************************************************/
    /*                                          Index method test cases                                               */
    /***********************************************************************************************************/

    abstract public function test_index_method_route_is_setup();

    abstract public function test_index_method_route_redirects_to_login_if_user_is_not_authenticated();

    abstract public function test_index_method_view_exists();

    abstract public function test_index_method_view_contains_paginated_variable_instance();

    /***********************************************************************************************************/
    /*                                          Create method test cases                                               */
    /***********************************************************************************************************/

    abstract public function test_create_method_route_is_setup();

    abstract public function test_create_method_view_exists();

    abstract public function test_create_method_route_redirects_to_login_if_user_is_not_authenticated();

      /***********************************************************************************************************/
    /*                                          Show method test cases                                               */
    /***********************************************************************************************************/

    abstract public function test_show_method_route_is_setup();

    abstract public function test_show_method_view_exists();

    abstract public function test_show_method_redirects_to_login_if_user_is_not_authenticated();

    abstract public function test_show_method_view_contains_variable_instance_of_correct_class();

    abstract public function test_show_method_view_returns_correct_instance();

    abstract public function test_show_method_redirects_to_index_route_on_bad_id_error();

    abstract public function test_show_method_redirects_with_correct_error_message_on_bad_id_error();


      /***********************************************************************************************************/
    /*                                          Edit method test cases                                               */
    /***********************************************************************************************************/

    abstract public function test_edit_method_route_is_setup();

    abstract public function test_edit_method_view_exists();

    abstract public function test_edit_method_redirects_to_login_if_user_is_not_authenticated();

    abstract public function test_edit_method_redirects_to_index_on_bad_id_error();

    abstract public function test_edit_method_redirects_with_correct_error_message_on_bad_id_error();

    abstract public function test_edit_method_view_contains_instance_of_correct_class();

    abstract public function test_edit_method_view_contains_correct_subjectModel_instance();


      /***********************************************************************************************************/
    /*                                          Store method test cases                                               */
    /***********************************************************************************************************/

    abstract public function test_store_method_redirects_to_login_if_user_is_not_authenticated();

    abstract public function test_store_method_after_post_view_exists();

    abstract public function test_store_method_redirects_to_correct_route_on_success();

    abstract public function test_store_method_redirects_to_create_route_on_bad_attributes_error();

    abstract public function test_store_method_view_has_correct_error_message_on_bad_attributes_error();



      /***********************************************************************************************************/
    /*                                          Update method test cases                                               */
    /***********************************************************************************************************/

    abstract public function test_update_method_route_redirects_to_login_if_user_is_not_authenticated();

    abstract public function test_update_method_after_put_view_exists();

    abstract public function test_update_method_redirects_to_correct_route_on_success();

    abstract public function test_update_method_redirects_with_correct_instance_on_success();

    abstract public function test_update_method_redirects_to_edit_route_on_bad_attributes_error();

    abstract public function test_update_method_redirects_with_correct_error_message_on_bad_attributes_error();

    abstract public function test_update_method_redirects_to_index_route_on_bad_id_error();

    abstract public function test_update_method_redirects_with_correct_error_message_on_bad_id_error();

      /***********************************************************************************************************/
    /*                                          Destroy method test cases                                               */
    /***********************************************************************************************************/

    abstract public function test_destroy_method_route_redirects_to_login_if_user_is_not_authenticated();

    abstract public function test_destroy_method_after_delete_view_exists();

    abstract public function test_destroy_method_correct_instance_is_deleted();

    abstract public function test_destroy_method_redirects_to_index_route_on_success();

    abstract public function test_destroy_method_redirects_with_correct_message_on_success();

    abstract public function test_destroy_method_redirects_to_index_route_on_bad_id_error();

    abstract public function test_destroy_method_redirects_with_correct_message_on_bad_id_error();





    public function assert_index_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();
        $response = $this->getIndexRoute();
        $this->assertTrue($response->isOk());
    }

    public function assert_index_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $response = $this->getIndexRoute();
        $this->assertRedirectedToLoginPage($response);
    }

    public function assert_index_method_view_exists()
    {
        $this->assertViewExists($this->indexView);
    }

    public function assert_index_method_view_contains_paginated_variable_instance()
    {
        $this->simulateAuthenticatedUser();
        $response = $this->getIndexRoute();
        $view = $response->original;
        $this->assertEquals($this->paginationClass, get_class($view[$this->indexCollectionVariable]));
    }

    public function assert_create_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();
        $response = $this->getCreateRoute();
        $this->assertTrue($response->isOk());
    }

    public function assert_create_method_view_exists()
    {
        $this->assertViewExists($this->createView);
    }

    public function assert_create_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $response = $this->getCreateRoute();
        $this->assertRedirectedToLoginPage($response);
    }




}





