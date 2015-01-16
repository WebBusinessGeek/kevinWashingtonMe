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
        $this->assertTrue(View::exists($this->indexView));
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
        $this->assertTrue(View::exists($this->createView));
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
        $this->assertTrue(View::exists($this->showView));
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

    }

    public function test_edit_method_view_exists()
    {

    }

    public function test_edit_method_view_contains_instance_of_correct_class()
    {

    }

    public function test_edit_method_view_contains_correct_subjectModel_instance()
    {

    }









}
