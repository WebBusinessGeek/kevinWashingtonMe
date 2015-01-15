<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/15/15
 * Time: 12:26 PM
 */

namespace tests\superCategoryDirectory;


use App\Base\ExternalServiceTestAssist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class SuperCategoryControllerTest extends ExternalServiceTestAssist {


    public $indexRoute = 'dashboard/supercategory';

    public $indexView = 'supercategory.index';

    public $indexCollectionVariable = 'supercategories';

    public $createRoute = 'dashboard/supercategory/create';

    public $createView = 'supercategory.create';


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

        $this->assertRedirectedTo('login');

//        $this->asser
//        $this->assertTrue($response->isRedirect());
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

        $this->assertTrue($response->isRedirect());
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

        //supercategory instance for this test

        //id to use

        //response to show route with id

        //assert response is ok

        //cleanup
    }

    public function test_show_method_redirects_if_user_is_not_authenticated()
    {

    }

    public function test_show_method_view_exists()
    {

    }

    public function test_show_method_view_contains_variable_of_correct_class()
    {

    }



}
