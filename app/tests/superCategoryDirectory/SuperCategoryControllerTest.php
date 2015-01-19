<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/15/15
 * Time: 5:08 PM
 */

namespace tests\superCategoryDirectory;

use App\Base\ExternalServiceTestAssist;

use App\DomainLogic\SuperCategoryDirectory\SuperCategory;
use Illuminate\Support\Facades\View;



class SuperCategoryControllerTest extends ExternalServiceTestAssist {

    public $indexRoute = 'dashboard/supercategory';
    public $indexView = 'supercategory.index';
    public $indexCollectionVariable = 'supercategories';
    public $createRoute = 'dashboard/supercategory/create';
    public $createView = 'supercategory.create';
    public $showRoute = 'dashboard/supercategory';
    public $showView = 'supercategory.show';
    public $showInstanceVariable = 'supercategory';
    public $editRoute = 'dashboard/supercategory/{id}/edit';
    public $editView = 'supercategory.edit';
    public $editInstanceVariable = 'supercategoryForEdit';
    public $storeRoute = 'dashboard/supercategory/';
    public $storeAfterPostView = 'supercategory.show';
    public $updateRoute = 'dashboard/supercategory';
    public $updateAfterPutView = 'supercategory.show';
    public $destroyRoute = 'dashboard/supercategory';
    public $destroyAfterDeleteView = 'supercategory.index';

    public function __construct()
    {
        $this->externalService = new \SuperCategoryController();
    }
    /***********************************************************************************************************/
    /*                                          Index method test cases                                               */
    /***********************************************************************************************************/
    public function test_index_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();
        $response = $this->getIndexRoute();
        $this->assertTrue($response->isOk());
    }
    public function test_index_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $response = $this->getIndexRoute();

        $this->assertRedirectedToLoginPage($response);

    }
    public function test_index_method_view_exists()
    {
        $this->assertViewExists($this->indexView);
    }
    public function test_index_method_view_contains_paginated_variable_instance()
    {
        $this->simulateAuthenticatedUser();
        $response = $this->getIndexRoute();
        $view = $response->original;
        $this->assertEquals($this->paginationClass, get_class($view[$this->indexCollectionVariable]));
    }
    /***********************************************************************************************************/
    /*                                          Create method test cases                                              */
    /***********************************************************************************************************/
    public function test_create_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();
        $response = $this->getCreateRoute();
        $this->assertTrue($response->isOk());
    }
    public function test_create_method_view_exists()
    {
        $this->assertViewExists($this->createView);
    }
    public function test_create_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $response = $this->getCreateRoute();
        $this->assertRedirectedToLoginPage($response);
    }

    /***********************************************************************************************************/
    /*                                          Show method test cases                                              */
    /***********************************************************************************************************/
    public function test_show_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $parameterForShowRoute = $subjectModel->id;
        $showRouteResponse = $this->getShowRoute($parameterForShowRoute);
        $this->assertTrue($showRouteResponse->isOk());
        $this->cleanUpSingleModelAfterTesting($subjectModel);

    }
    public function test_show_method_view_exists()
    {
        $this->assertViewExists($this->showView);
    }

    public function test_show_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $subjectModel = $this->createSubjectModelInstance();
        $parameterForShowRoute = $subjectModel->id;
        $showRouteResponse = $this->getShowRoute($parameterForShowRoute);
        $this->assertRedirectedToLoginPage($showRouteResponse);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }


    public function test_show_method_view_contains_variable_instance_of_correct_class()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $parameterForShowRoute = $subjectModel->id;
        $showRouteResponse = $this->getShowRoute($parameterForShowRoute);
        $view = $this->getView($showRouteResponse);
        $this->assertTrue($this->isSubjectModelInstance($view[$this->showInstanceVariable]));
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function test_show_method_view_returns_correct_instance()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $parameterForShowRoute = $subjectModel->id;
        $showRouteResponse = $this->getShowRoute($parameterForShowRoute);
        $view = $this->getView($showRouteResponse);
        $this->assertEquals($subjectModel->title, $view[$this->showInstanceVariable]->title);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }


    public function test_show_method_redirects_to_index_route_if_bad_id_used()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $showRouteResponse = $this->getShowRoute($badId);
        $location = $this->getResponseLocation($showRouteResponse);
        $this->assertLocationIsAIndexRoute($location);
    }

    public function test_show_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $showRouteResponse = $this->getShowRoute($badId);
        $viewErrorMessage = $this->getViewMessage($showRouteResponse);
        $this->assertEquals($this->badIdExpectedErrorMessage, $viewErrorMessage);
    }

    /***********************************************************************************************************/
    /*                                          Edit method test cases                                              */
    /***********************************************************************************************************/

    public function test_edit_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $parameterToSendToEditRoute = $subjectModel->id;
        $requestToEditRoute = $this->getEditRoute($parameterToSendToEditRoute);
        $this->assertTrue($requestToEditRoute->isOK());
        $this->cleanUpSingleModelAfterTesting($subjectModel);

    }
    public function test_edit_method_view_exists()
    {
        $this->assertViewExists($this->editView);
    }

    public function test_edit_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $subjectModel = $this->createSubjectModelInstance();
        $parameterToSendToEditRoute = $subjectModel->id;
        $requestToEditRoute = $this->getEditRoute($parameterToSendToEditRoute);
        $this->assertRedirectedToLoginPage($requestToEditRoute);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function test_edit_method_redirects_to_index_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $editRouteResponse = $this->getEditRoute($badId);
        $location = $this->getResponseLocation($editRouteResponse);
        $this->assertLocationIsAIndexRoute($location);
    }
    public function test_edit_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $editRouteResponse = $this->getEditRoute($badId);
        $viewErrorMessage = $this->getViewMessage($editRouteResponse);
        $this->assertEquals($this->badIdExpectedErrorMessage, $viewErrorMessage);
    }

    public function test_edit_method_view_contains_instance_of_correct_class()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $parameterForEditRoute = $subjectModel->id;
        $requestToEditRoute = $this->getEditRoute($parameterForEditRoute);
        $view = $this->getView($requestToEditRoute);
        $this->assertTrue($this->isSubjectModelInstance($view[$this->editInstanceVariable]));
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function test_edit_method_view_contains_correct_subjectModel_instance()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $parameterForEditRoute = $subjectModel->id;
        $editRouteRequest = $this->getEditRoute($parameterForEditRoute);
        $view = $this->getView($editRouteRequest);
        $viewSubjectModel = $view[$this->editInstanceVariable];
        $this->assertEquals($subjectModel->title, $viewSubjectModel->title);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    /***********************************************************************************************************/
    /*                                          Store method test cases                                              */
    /***********************************************************************************************************/


    public function test_store_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $attributes = $this->simulateAttributesForSubjectModel('good');
        $storeRouteResponse = $this->postStoreRoute($attributes);
        $this->assertRedirectedToLoginPage($storeRouteResponse);
    }

    public function test_store_method_after_post_view_exists()
    {
        $this->assertViewExists($this->storeAfterPostView);
    }

    public function test_store_method_redirects_to_correct_route_on_success()
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

    public function test_store_method_redirects_to_create_route_on_error()
    {
        $this->simulateAuthenticatedUser();
        $attributes = $this->simulateAttributesForSubjectModel('bad');
        $storeRouteResponse = $this->postStoreRoute($attributes);
        $location = $this->getResponseLocation($storeRouteResponse);
        $this->assertLocationIsACreateRoute($location);
    }

    public function test_store_method_view_has_error_message_when_attributes_are_invalid()
    {
        $this->simulateAuthenticatedUser();
        $attributes = $this->simulateAttributesForSubjectModel('bad');
        $storeRouteResponse = $this->postStoreRoute($attributes);
        $viewMessage = $this->getViewMessage($storeRouteResponse);
        $this->assertEquals($this->storeExpectedErrorMessage, $viewMessage);
    }


    /***********************************************************************************************************/
    /*                                          Update method test cases                                         */
    /***********************************************************************************************************/

    public function test_update_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $attributes = $this->simulateAttributesForSubjectModel('good');
        $updateRouteResponse = $this->putUpdateRoute($subjectModelId, $attributes);
        $this->assertRedirectedToLoginPage($updateRouteResponse);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function test_update_method_after_put_view_exists()
    {
        $this->assertViewExists($this->updateAfterPutView);
    }

    public function test_update_method_redirected_to_correct_route_on_success()
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

    public function test_update_method_redirects_with_correct_instance_on_success()
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

    public function test_update_method_redirects_to_edit_route_on_bad_attributes_error()
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

    public function test_update_method_redirects_with_correct_error_message_on_bad_attributes_error()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $badAttributes = $this->simulateAttributesForSubjectModel('bad');
        $updateRouteResponse = $this->putUpdateRoute($subjectModelId, $badAttributes);
        $errorMessage = $this->getViewMessage($updateRouteResponse);
        $this->assertEquals($this->updateExpectedErrorMessage, $errorMessage);
        $this->cleanUpSingleModelAfterTesting($subjectModel);

    }

    public function test_update_method_redirects_to_index_route_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $attributes = $this->simulateAttributesForSubjectModel('good');
        $updateRouteResponse = $this->putUpdateRoute($badId, $attributes);
        $location = $this->getResponseLocation($updateRouteResponse);
        $this->assertLocationIsAIndexRoute($location);

    }

    public function test_update_method_redirects_with_correct_error_message_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $attributes = $this->simulateAttributesForSubjectModel('good');
        $updateRouteResponse = $this->putUpdateRoute($badId, $attributes);
        $errorMessage = $this->getViewMessage($updateRouteResponse);
        $this->assertEquals($this->badIdExpectedErrorMessage, $errorMessage);
    }


    /***********************************************************************************************************/
    /*                                          Destroy method test cases                                         */
    /***********************************************************************************************************/

    public function test_destroy_method_route_redirects_to_login_if_user_is_not_authenticated()
    {
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $destroyRouteResponse = $this->deleteDestroyRoute($subjectModelId);
        $this->assertRedirectedToLoginPage($destroyRouteResponse);
        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function test_destroy_method_after_delete_view_exists()
    {
        $this->assertViewExists($this->destroyAfterDeleteView);
    }

    public function test_destroy_method_correct_instance_is_deleted()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $this->deleteDestroyRoute($subjectModelId);
        $databaseCheck = $this->getSubjectModelFromDatabase($subjectModelId);
        $this->assertEquals(null, $databaseCheck);
    }

    public function test_destroy_method_redirects_to_index_route_on_success()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $destroyRouteResponse = $this->deleteDestroyRoute($subjectModelId);
        $location = $this->getResponseLocation($destroyRouteResponse);
        $this->assertLocationIsAIndexRoute($location);
    }

    public function test_destroy_method_redirects_with_correct_message_on_success()
    {
        $this->simulateAuthenticatedUser();
        $subjectModel = $this->createSubjectModelInstance();
        $subjectModelId = $subjectModel->id;
        $destroyRouteResponse = $this->deleteDestroyRoute($subjectModelId);
        $successMessage = $this->getViewMessage($destroyRouteResponse);
        $this->assertEquals($this->destroySuccessMessage, $successMessage);
    }

    public function test_destroy_method_redirects_to_index_route_on_bad_id_error()
    {
        $this->simulateAuthenticatedUser();
        $badId = $this->simulateBadIDForSubjectModel();
        $destroyRouteResponse = $this->deleteDestroyRoute($badId);
        $location  = $this->getResponseLocation($destroyRouteResponse);
        $this->assertLocationIsAIndexRoute($location);
    }

    public function test_destroy_method_redirects_with_correct_message_on_bad_id_error()
    {
        //TODO: IMPLEMENT test case!
    }


}
