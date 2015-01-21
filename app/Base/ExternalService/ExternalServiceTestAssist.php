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
        $response = $this->GETIndexRoute();
        $this->assertTrue($response->isOk());
    }

    public function assert_index_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $response = $this->GETIndexRoute();
        $this->assertRedirectedToLoginPage($response);
    }

    public function assert_index_method_view_exists()
    {
        $this->assertViewExists($this->indexView);
    }

    public function assert_index_method_view_contains_paginated_variable_instance()
    {
        $this->simulateAuthenticatedUser();
        $response = $this->GETIndexRoute();
        $view = $response->original;
        $this->assertEquals($this->paginationClass, get_class($view[$this->indexCollectionVariable]));
    }

    public function assert_create_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();
        $response = $this->GETCreateRoute();
        $this->assertTrue($response->isOk());
    }

    public function assert_create_method_view_exists()
    {
        $this->assertViewExists($this->createView);
    }

    public function assert_create_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $response = $this->GETCreateRoute();
        $this->assertRedirectedToLoginPage($response);
    }

    public function assert_show_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $idForShowRoute = $subjectModel->id;
        $showRouteResponse = $this->GETShowRoute($idForShowRoute);
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
        $showRoutResponse = $this->GETShowRoute($idForShowRoute);
        $this->assertRedirectedToLoginPage($showRoutResponse);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_show_method_view_contains_variable_instance_of_correct_class()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $idForShowRoute = $subjectModel->id;
        $showRouteResponse = $this->GETShowRoute($idForShowRoute);
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
        $showRouteResponse = $this->GETShowRoute($idForShowRoute);
        $view = $this->getView($showRouteResponse);
        $variableInstanceFromView = $view[$this->showInstanceVariable];
        $this->assertEquals($subjectModel->id, $variableInstanceFromView->id);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_show_method_redirects_to_index_route_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $showRouteResponse = $this->GETShowRoute($badId);
        $location = $this->getResponseLocation($showRouteResponse);
        $this->assertLocationIsAIndexRoute($location);
    }

    public function assert_show_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $showRouteResponse = $this->GETShowRoute($badId);
        $viewErrorMessage = $this->getViewMessage($showRouteResponse);
        $this->assertEquals($this->badIdExpectedErrorMessage, $viewErrorMessage);
    }

    public function assert_edit_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $idForEditRoute = $subjectModel->id;
        $editRouteResponse = $this->GETEditRoute($idForEditRoute);
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
        $editRouteResponse = $this->GETEditRoute($idForEditRoute);
        $this->assertRedirectedToLoginPage($editRouteResponse);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_edit_method_redirects_to_index_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $editRouteResponse = $this->GETEditRoute($badId);
        $location = $this->getResponseLocation($editRouteResponse);
        $this->assertLocationIsAIndexRoute($location);
    }

    public function assert_edit_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $editRouteResponse = $this->GETEditRoute($badId);
        $viewErrorMessage = $this->getViewMessage($editRouteResponse);
        $this->assertEquals($this->badIdExpectedErrorMessage, $viewErrorMessage);
    }

    public function assert_edit_method_view_contains_instance_of_correct_class()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $idForEditRoute = $subjectModel->id;
        $editRouteResponse = $this->GETEditRoute($idForEditRoute);
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
        $editRouteResponse = $this->GETEditRoute($idForEditRoute);
        $view = $this->getView($editRouteResponse);
        $variableInstanceFromView = $view[$this->editInstanceVariable];
        $this->assertEquals($subjectModel->id, $variableInstanceFromView->id);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }


    public function assert_store_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $attributes = $this->simulateAttributesForSubjectModel('bad');
        $storeRouteResponse = $this->POSTStoreRoute($attributes);
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
        $storeRouteResponse = $this->POSTStoreRoute($attributes);
        $location = $this->getResponseLocation($storeRouteResponse);
        $this->assertLocationIsAShowRoute($location);
        $idForSubjectModel = $this->getIdFromShowRoute($location);
        $subjectModel = $this->getSubjectModelFromDatabase($idForSubjectModel);
        if($this->subjectModelHasOwner())
        {
            $this->destroySubjectModelOwner($subjectModel);
        }
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_store_method_redirects_to_create_route_on_bad_attributes_error()
    {
        $this->simulateAuthenticatedUser();
        $attributes = $this->simulateAttributesForSubjectModel('bad');
        $storeRouteResponse = $this->POSTStoreRoute($attributes);
        $location = $this->getResponseLocation($storeRouteResponse);
        $this->assertLocationIsACreateRoute($location);
    }

    public function assert_store_method_view_has_correct_error_message_on_bad_attributes_error()
    {
        $this->simulateAuthenticatedUser();
        $attributes = $this->simulateAttributesForSubjectModel('bad');
        $storeRouteResponse = $this->POSTStoreRoute($attributes);
        $viewMessage = $this->getViewMessage($storeRouteResponse);
        $this->assertEquals($this->badAttributesForStoreMessage, $viewMessage);
    }

    public function assert_update_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $attributes = $this->simulateAttributesForSubjectModel('good');
        $updateRouteResponse = $this->PUTUpdateRoute($subjectModelId, $attributes);
        $this->assertRedirectedToLoginPage($updateRouteResponse);

        if($this->subjectModelHasOwner())
        {
            $attributeThatRepresentsOwner = $this->getAttributeThatRepresentsOwner();
            $subjectModel->$attributeThatRepresentsOwner = $attributes[$attributeThatRepresentsOwner];
            $this->destroySubjectModelOwner($subjectModel);
        }
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
        $updateRouteResponse = $this->PUTUpdateRoute($subjectModelId, $attributes);
        $location = $this->getResponseLocation($updateRouteResponse);
        $this->assertLocationIsAShowRoute($location);
        $subjectModelFromDB = $this->getSubjectModelFromDatabase($subjectModelId);
        if($this->subjectModelHasOwner())
        {
            $this->destroySubjectModelOwner($subjectModelFromDB);
        }
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_update_method_redirects_with_correct_instance_on_success()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $attributes = $this->simulateAttributesForSubjectModel('good');
        $updateRouteResponse = $this->PUTUpdateRoute($subjectModelId, $attributes);
        $instanceVariable = $this->getShowInstanceVariableFromRedirectResponse($updateRouteResponse);
        $this->assertTrue($this->isSubjectModelInstance($instanceVariable));
        $subjectModelFromDB = $this->getSubjectModelFromDatabase($subjectModelId);
        if($this->subjectModelHasOwner())
        {
            $this->destroySubjectModelOwner($subjectModelFromDB);
        }
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }


    public function assert_update_method_redirects_to_edit_route_on_bad_attributes_error()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $badAttributes = $this->simulateAttributesForSubjectModel('bad');
        $updateRouteResponse = $this->PUTUpdateRoute($subjectModelId, $badAttributes);
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
        $updateRouteResponse = $this->PUTUpdateRoute($subjectModelId, $badAttributes);
        $errorMessage = $this->getViewMessage($updateRouteResponse);
        $this->assertEquals($this->badAttributesForUpdateMessage, $errorMessage);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_update_method_redirects_to_index_route_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $attributes = $this->simulateAttributesForSubjectModel('bad');
        $updateRouteResponse = $this->PUTUpdateRoute($badId, $attributes);
        $location = $this->getResponseLocation($updateRouteResponse);
        $this->assertLocationIsAIndexRoute($location);
    }

    public function assert_update_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $attributes = $this->simulateAttributesForSubjectModel('bad');
        $updateRouteResponse = $this->PUTUpdateRoute($badId, $attributes);
        $errorMessage = $this->getViewMessage($updateRouteResponse);
        $this->assertEquals($this->badIdExpectedErrorMessage, $errorMessage);
    }

    public function assert_destroy_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $destroyRouteResponse = $this->DELETEDestroyRoute($subjectModelId);
        $this->assertRedirectedToLoginPage($destroyRouteResponse);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function assert_destroy_method_after_delete_view_exists()
    {
        $this->assertViewExists($this->destroyAfterDeleteView);
    }

    public function assert_destroy_method_correct_instance_is_deleted()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $this->DELETEDestroyRoute($subjectModelId);
        $databaseCheck = $this->getSubjectModelFromDatabase($subjectModelId);
        $this->assertEquals(null, $databaseCheck);
    }

    public function assert_destroy_method_redirects_to_index_route_on_success()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $destroyRouteResponse = $this->DELETEDestroyRoute($subjectModelId);
        $location = $this->getResponseLocation($destroyRouteResponse);
        $this->assertLocationIsAIndexRoute($location);
    }

    public function assert_destroy_method_redirects_with_correct_message_on_success()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $destroyRouteResponse = $this->DELETEDestroyRoute($subjectModelId);
        $successMessage = $this->getViewMessage($destroyRouteResponse);
        $this->assertEquals($this->destroySuccessMessage, $successMessage);
    }

    public function assert_destroy_method_redirects_to_index_route_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $destroyRouteResponse = $this->DELETEDestroyRoute($badId);
        $location  = $this->getResponseLocation($destroyRouteResponse);
        $this->assertLocationIsAIndexRoute($location);
    }

    public function assert_destroy_method_redirects_with_correct_message_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $destroyRouteResponse = $this->DELETEDestroyRoute($badId);
        $errorMessage = $this->getViewMessage($destroyRouteResponse);
        $this->assertEquals($this->badIdExpectedErrorMessage, $errorMessage);
    }



}








