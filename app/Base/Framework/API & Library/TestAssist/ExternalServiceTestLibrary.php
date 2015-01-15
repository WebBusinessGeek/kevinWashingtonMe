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

abstract class ExternalServiceTestLibrary extends MasterTestLibrary {

    public $externalService;

    public $paginationClass = 'Illuminate\Pagination\Paginator';

    public $unauthenticatedRedirectionRoute = 'login';

    public $indexRoute;

    public $indexView;

    public $indexCollectionVariable;


    public $createRoute;

    public $createView;


    public $showRoute;

    public $showView;


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


    public function getShowRoute($parameters)
    {
        return $this->getRoute($this->showRoute, $parameters );
    }


    public function getRoute($route, $parameters = null)
    {
       return (isset($parameters))? $this->call('GET', $route, $parameters): $this->call('GET', $route);
    }
}