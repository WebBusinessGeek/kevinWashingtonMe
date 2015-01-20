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

    abstract public function test_update_method_redirects_to_show_route_on_success();

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

    public function assert_show_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $idForShowRoute = $subjectModel->id;
        $showRouteResponse = $this->getShowRoute($idForShowRoute);
        $this->assertTrue($showRouteResponse->isOk());
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_show_method_view_exists()
    {
        $this->assertViewExists($this->showView);
    }

    public function assert_show_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $subjectModel = $this->createSubjectModelInstance();
        $idForShowRoute = $subjectModel->id;
        $showRoutResponse = $this->getShowRoute($idForShowRoute);
        $this->assertRedirectedToLoginPage($showRoutResponse);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_show_method_view_contains_variable_instance_of_correct_class()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $idForShowRoute = $subjectModel->id;
        $showRouteResponse = $this->getShowRoute($idForShowRoute);
        $view = $this->getView($showRouteResponse);
        $variableInstanceFromView = $view[$this->showInstanceVariable];
        $this->assertTrue($this->isSubjectModelInstance($variableInstanceFromView));
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_show_method_view_returns_correct_instance()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $idForShowRoute = $subjectModel->id;
        $showRouteResponse = $this->getShowRoute($idForShowRoute);
        $view = $this->getView($showRouteResponse);
        $variableInstanceFromView = $view[$this->showInstanceVariable];
        $this->assertEquals($subjectModel->id, $variableInstanceFromView->id);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_show_method_redirects_to_index_route_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $showRouteResponse = $this->getShowRoute($badId);
        $location = $this->getResponseLocation($showRouteResponse);
        $this->assertLocationIsAIndexRoute($location);
    }

    public function assert_show_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $showRouteResponse = $this->getShowRoute($badId);
        $viewErrorMessage = $this->getViewMessage($showRouteResponse);
        $this->assertEquals($this->badIdExpectedErrorMessage, $viewErrorMessage);
    }

    public function assert_edit_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $idForEditRoute = $subjectModel->id;
        $editRouteResponse = $this->getEditRoute($idForEditRoute);
        $this->assertTrue($editRouteResponse->isOk());
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_edit_method_view_exists()
    {
        $this->assertViewExists($this->editView);
    }

    public function assert_edit_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $subjectModel = $this->createSubjectModelInstance();
        $idForEditRoute = $subjectModel->id;
        $editRouteResponse = $this->getEditRoute($idForEditRoute);
        $this->assertRedirectedToLoginPage($editRouteResponse);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_edit_method_redirects_to_index_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $editRouteResponse = $this->getEditRoute($badId);
        $location = $this->getResponseLocation($editRouteResponse);
        $this->assertLocationIsAIndexRoute($location);
    }

    public function assert_edit_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $editRouteResponse = $this->getEditRoute($badId);
        $viewErrorMessage = $this->getViewMessage($editRouteResponse);
        $this->assertEquals($this->badIdExpectedErrorMessage, $viewErrorMessage);
    }

    public function assert_edit_method_view_contains_instance_of_correct_class()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $idForEditRoute = $subjectModel->id;
        $editRouteResponse = $this->getEditRoute($idForEditRoute);
        $view = $this->getView($editRouteResponse);
        $variableInstanceFromView = $view[$this->editInstanceVariable];
        $this->assertTrue($this->isSubjectModelInstance($variableInstanceFromView));
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_edit_method_view_contains_correct_subjectModel_instance()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $idForEditRoute = $subjectModel->id;
        $editRouteResponse = $this->getEditRoute($idForEditRoute);
        $view = $this->getView($editRouteResponse);
        $variableInstanceFromView = $view[$this->editInstanceVariable];
        $this->assertEquals($subjectModel->id, $variableInstanceFromView->id);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }


    public function assert_store_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $attributes = $this->simulateAttributesForSubjectModel('good');
        $storeRouteResponse = $this->postStoreRoute($attributes);
        $this->assertRedirectedToLoginPage($storeRouteResponse);
    }


    public function assert_store_method_after_post_view_exists()
    {
        $this->assertViewExists($this->storeAfterPostView);
    }

    public function assert_store_method_redirects_to_correct_route_on_success()
    {
        $this->simulateAuthenticatedUser();
        $attributes = $this->simulateAttributesForSubjectModel('good');
        $storeRouteResponse = $this->postStoreRoute($attributes);
        $location = $this->getResponseLocation($storeRouteResponse);
        $this->assertLocationIsAShowRoute($location);
        $idForSubjectModel = $this->getIdFromShowRoute($location);
        $subjectModel = $this->getSubjectModelFromDatabase($idForSubjectModel);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_store_method_redirects_to_create_route_on_bad_attributes_error()
    {
        $this->simulateAuthenticatedUser();
        $attributes = $this->simulateAttributesForSubjectModel('bad');
        $storeRouteResponse = $this->postStoreRoute($attributes);
        $location = $this->getResponseLocation($storeRouteResponse);
        $this->assertLocationIsACreateRoute($location);
    }

    public function assert_store_method_view_has_correct_error_message_on_bad_attributes_error()
    {
        $this->simulateAuthenticatedUser();
        $attributes = $this->simulateAttributesForSubjectModel('bad');
        $storeRouteResponse = $this->postStoreRoute($attributes);
        $viewMessage = $this->getViewMessage($storeRouteResponse);
        $this->assertEquals($this->badAttributesForStoreMessage, $viewMessage);
    }

    public function assert_update_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $attributes = $this->simulateAttributesForSubjectModel('good');
        $updateRouteResponse = $this->putUpdateRoute($subjectModelId, $attributes);
        $this->assertRedirectedToLoginPage($updateRouteResponse);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_update_method_after_put_view_exists()
    {
        $this->assertViewExists($this->updateAfterPutView);
    }

    public function assert_update_method_redirects_to_show_route_on_success()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $attributes = $this->simulateAttributesForSubjectModel('good');
        $updateRouteResponse = $this->putUpdateRoute($subjectModelId, $attributes);
        $location = $this->getResponseLocation($updateRouteResponse);
        $this->assertLocationIsAShowRoute($location);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_update_method_redirects_with_correct_instance_on_success()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $attributes = $this->simulateAttributesForSubjectModel('good');
        $updateRouteResponse = $this->putUpdateRoute($subjectModelId, $attributes);
        $instanceVariable = $this->getShowInstanceVariableFromRedirectResponse($updateRouteResponse);
        $this->assertTrue($this->isSubjectModelInstance($instanceVariable));
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }


    public function assert_update_method_redirects_to_edit_route_on_bad_attributes_error()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $badAttributes = $this->simulateAttributesForSubjectModel('bad');
        $updateRouteResponse = $this->putUpdateRoute($subjectModelId, $badAttributes);
        $location = $this->getResponseLocation($updateRouteResponse);
        $this->assertLocationIsAEditRoute($location);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_update_method_redirects_with_correct_error_message_on_bad_attributes_error()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $badAttributes = $this->simulateAttributesForSubjectModel('bad');
        $updateRouteResponse = $this->putUpdateRoute($subjectModelId, $badAttributes);
        $errorMessage = $this->getViewMessage($updateRouteResponse);
        $this->assertEquals($this->badAttributesForUpdateMessage, $errorMessage);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_update_method_redirects_to_index_route_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $attributes = $this->simulateAttributesForSubjectModel('good');
        $updateRouteResponse = $this->putUpdateRoute($badId, $attributes);
        $location = $this->getResponseLocation($updateRouteResponse);
        $this->assertLocationIsAIndexRoute($location);
    }

    public function assert_update_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $attributes = $this->simulateAttributesForSubjectModel('good');
        $updateRouteResponse = $this->putUpdateRoute($badId, $attributes);
        $errorMessage = $this->getViewMessage($updateRouteResponse);
        $this->assertEquals($this->badIdExpectedErrorMessage, $errorMessage);
    }

    public function assert_destroy_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $destroyRouteResponse = $this->deleteDestroyRoute($subjectModelId);
        $this->assertRedirectedToLoginPage($destroyRouteResponse);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }
}






