<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/15/15
 * Time: 11:48 AM
 */

namespace App\Base;

use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Support\Facades\Auth;

abstract class ExternalServiceTestLibrary extends \TestCase {

    public $externalService;

    public $paginationClass = 'Illuminate\Pagination\Paginator';

    public $unauthenticatedRedirectionRoute = 'login';

    public $indexRoute;

    public $indexView;

    public $indexCollectionVariable;


    public $createRoute;

    public $createView;


    public function simulateAuthenticatedUser()
    {
        Auth::shouldReceive('check')->once()->andReturn(true);
    }




    public function getIndexRoute()
    {
        return $this->getRoute($this->indexRoute);
    }

    public function getCreateRoute()
    {
        return $this->getRoute($this->createRoute);
    }

    public function getRoute($route)
    {
       return $this->call('GET', $route);
    }
}