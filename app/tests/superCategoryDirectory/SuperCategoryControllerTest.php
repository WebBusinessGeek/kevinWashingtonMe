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

class SuperCategoryControllerTest extends ExternalServiceTestAssist {


    public $indexRoute = 'dashboard/supercategory';


    public function __construct()
    {
        $this->externalService = new \SuperCategoryController();
    }




    public function test_index_method_route_is_setup()
    {
        Auth::shouldReceive('check')->once()->andReturn(true);
        
        $response = $this->call('GET', $this->indexRoute);

        $this->assertTrue($response->isOk());
    }


    public function test_index_method_route_tests_for_authentication()
    {
        $response = $this->call('GET', $this->indexRoute);

        $this->assertTrue($response->isRedirect());
    }

    public function test_index_method_redirects_if_user_is_not_authenticated()
    {
    }
}
