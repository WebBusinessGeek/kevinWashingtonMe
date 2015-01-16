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
    public function test_index_method_route_redirects_if_user_is_not_authenticated()
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
    public function test_create_method_route_redirects_if_user_is_not_authenticated()
    {
        $response = $this->getCreateRoute();

        $this->assertRedirectedToLoginPage($response);
    }

    public function test_create_method_view_exists()
    {
        $this->assertViewExists($this->createView);
    }
    /***********************************************************************************************************/
    /*                                          Show method test cases                                              */
    /***********************************************************************************************************/
    public function test_show_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();

        $subjectModel = SuperCategory::create(['title' => 'testShowMethodRouteIsSetup']);

        $parameterForShowRoute = $subjectModel->id;

        $showRouteResponse = $this->getShowRoute($parameterForShowRoute);

        $this->assertTrue($showRouteResponse->isOk());

        $this->cleanUpSingleModelAfterTesting($subjectModel);

    }
    public function test_show_method_redirects_if_user_is_not_authenticated()
    {
        $subjectModel = SuperCategory::create(['title' => 'testShowMethodRedirectsIfuserNotAuthenticated']);

        $parameterForShowRoute = $subjectModel->id;

        $showRouteResponse = $this->getShowRoute($parameterForShowRoute);

        $this->assertRedirectedToLoginPage($showRouteResponse);

        $this->cleanUpSingleModelAfterTesting($subjectModel);

    }

    public function test_show_method_view_exists()
    {
        $this->assertViewExists($this->showView);
    }

    public function test_show_method_view_contains_variable_of_correct_class()
    {
        $this->simulateAuthenticatedUser();

        $subjectModel = SuperCategory::create([
            'title' => 'testShowMethodViewContainsVariableOfCorrectClass',
        ]);

        $parameterForShowRoute = $subjectModel->id;

        $showRouteResponse = $this->getShowRoute($parameterForShowRoute);

        $view = $showRouteResponse->original;

        $this->assertTrue($this->isSubjectModelInstance($view[$this->showInstanceVariable]));

        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function test_show_method_view_returns_correct_instance()
    {
        $this->simulateAuthenticatedUser();

        $subjectModel = SuperCategory::create([
            'title' => 'testShowMethodViewContainsVariableOfCorrectClass',
        ]);

        $parameterForShowRoute = $subjectModel->id;

        $showRouteResponse = $this->getShowRoute($parameterForShowRoute);

        $view = $showRouteResponse->original;

        $this->assertEquals($subjectModel->title, $view[$this->showInstanceVariable]->title);

        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }


    public function test_redirected_to_correct_route_if_bad_id_used()
    {
        //TODO: implement test case.
    }

    public function test_redirected_with_correct_error_message_on_error()
    {
        //TODO: implement test case.
    }

    /***********************************************************************************************************/
    /*                                          Edit method test cases                                              */
    /***********************************************************************************************************/

    public function test_edit_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();

        $subjectModel = SuperCategory::create(['title' => 'testEditMethodRoutesIsSetup']);

        $parameterToSendToEditRoute = $subjectModel->id;

        $requestToEditRoute = $this->getEditRoute($parameterToSendToEditRoute);

        $this->assertTrue($requestToEditRoute->isOK());

        $this->cleanUpSingleModelAfterTesting($subjectModel);

    }

    public function test_edit_method_redirects_to_login_if_user_is_not_authenticated()
    {
        $subjectModel = SuperCategory::create(['title' => 'testEditMethodRedirectsToLoginIfUserIsNotAuth']);

        $parameterToSendToEditRoute = $subjectModel->id;

        $requestToEditRoute = $this->getEditRoute($parameterToSendToEditRoute);

        $this->assertRedirectedToLoginPage($requestToEditRoute);

        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function test_edit_method_view_exists()
    {
        $this->assertViewExists($this->editView);
    }

    public function test_edit_method_view_contains_instance_of_correct_class()
    {
        $this->simulateAuthenticatedUser();

        $subjectModel = SuperCategory::create(['title' => 'testEditMethodViewContainsInstanceOfCorrectClass']);

        $parameterForEditRoute = $subjectModel->id;

        $requestToEditRoute = $this->getEditRoute($parameterForEditRoute);

        $view = $requestToEditRoute->original;

        $this->assertTrue($this->isSubjectModelInstance($view[$this->editInstanceVariable]));

        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function test_edit_method_view_contains_correct_subjectModel_instance()
    {
        $this->simulateAuthenticatedUser();

        $subjectModel = SuperCategory::create(['title' => 'testEditMethodViewContainsCorrectSubjectModelInstance']);

        $parameterForEditRoute = $subjectModel->id;

        $requestToEditRoute = $this->getEditRoute($parameterForEditRoute);

        $view = $requestToEditRoute->original;

        $viewSubjectModel = $view[$this->editInstanceVariable];

        $this->assertEquals($subjectModel->title, $viewSubjectModel->title);

        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    /***********************************************************************************************************/
    /*                                          Store method test cases                                              */
    /***********************************************************************************************************/


    public function test_store_method_redirects_login_if_user_is_not_authenticated()
    {
        $attributes = [
            'title' => 'testStoreMethodRedirectsToLoginPage',
        ];

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

        $attributes = ['title' => 'testStoreMethodRedirectsToCorrectRouteOnSuccess'];

        $storeRouteResponse = $this->postStoreRoute($attributes);

        $location = $this->getResponseLocation($storeRouteResponse);

        $this->assertLocationIsAShowRoute($location);

        $idForSubjectModel = $this->getIdFromShowRoute($location);

        $subjectModel = SuperCategory::find($idForSubjectModel);

        $this->cleanUpSingleModelAfterTesting($subjectModel);
    }

    public function test_store_method_redirects_to_correct_route_on_error()
    {
        $this->simulateAuthenticatedUser();

        $attributes = [
            'wrong' => 'testStoreMethodRedirectsToCorrectRouteOnError',
            'title' => 'something'
        ];

        $storeRouteResponse = $this->postStoreRoute($attributes);

        $location = $this->getResponseLocation($storeRouteResponse);

        $this->assertLocationIsACreateRoute($location);
    }

    public function test_store_method_view_has_error_message_on_error()
    {
        $this->simulateAuthenticatedUser();

        $attributes = [
            'wrong' => 'testStoreMethodRedirectsToCorrectRouteOnError',
            'title' => 'something'
        ];

        $storeRouteResponse = $this->postStoreRoute($attributes);

        $viewMessage = $this->getViewErrorMessage($storeRouteResponse);

        $this->assertEquals($this->storeExpectedErrorMessage, $viewMessage);

    }


    /***********************************************************************************************************/
    /*                                          Update method test cases                                              */
    /***********************************************************************************************************/

    public function test_route_redirects_to_login_if_user_is_not_authenticated()
    {

    }

    public function test_method_after_post_view_exists()
    {

    }

    public function test_redirected_to_correct_route_on_success()
    {

    }

    public function test_redirect_with_correct_instance_on_success()
    {

    }

    public function test_redirected_to_correct_route_on_error()
    {

    }

    public function test_redirected_to_correct_error_message_if_error()
    {

    }




}
