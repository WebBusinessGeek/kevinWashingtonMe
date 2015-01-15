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

    public function __construct()
    {
        $this->externalService = new \SuperCategoryController();
    }




    public function test_index_method_route_is_setup()
    {
        $this->simulateAuthenticatedUser();

        $response = $this->getIndexRoute();

        $this->assertTrue($response->isOk());
    }


    public function test_index_method_route_redirects_if_user_is_not_authentication()
    {
        $response = $this->getIndexRoute();

        $this->assertTrue($response->isRedirect());
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
}
