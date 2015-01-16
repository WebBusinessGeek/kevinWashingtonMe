<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/15/15
 * Time: 11:48 AM
 */

namespace App\Base;

use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

abstract class ExternalServiceTestLibrary extends MasterTestLibrary {

    public $externalService;

    public $loginRedirectUrl = 'http://localhost/login';
    public $paginationClass = 'Illuminate\Pagination\Paginator';
    public $instanceClass = '';
    public $unauthenticatedRedirectionRoute = 'login';


    public $indexRoute;
    public $indexView;
    public $indexCollectionVariable;


    public $createRoute;
    public $createView;


    public $showRoute;
    public $showView;
    public $showInstanceVariable;

    public $editRoute;
    public $editView;
    public $editInstanceVariable;
    public $editRouteDelimeter = '{id}';

    public function simulateAuthenticatedUser()
    {
        Auth::shouldReceive('check')->once()->andReturn(true);
    }



    public function assertRedirectedToLoginPage(RedirectResponse $response)
    {
        $this->assertEquals($this->loginRedirectUrl, $response->headers->get('Location'));

    }

    public function assertLocationIsAShowRoute($location)
    {
        $this->assertTrue($this->assertEndOfRouteIsAnInteger($location));
    }
    public function assertEndOfRouteIsAnInteger($location)
    {
        return is_numeric($this->getIdFromShowRoute($location));
    }
    public function getIdFromShowRoute($location)
    {
        return explode($this->showRoute.'/', $location)[1];
    }



    public function assertLocationIsACreateRoute($location)
    {
        $this->assertEquals($this->removeFromRoute($this->createRoute, $location)[1], null);
    }
    public function removeFromRoute($delimiter, $route)
    {
        return explode($delimiter, $route);
    }



    public function getIndexRoute()
    {
        return $this->getRoute($this->indexRoute);
    }
    public function getCreateRoute()
    {
        return $this->getRoute($this->createRoute);
    }
    public function getShowRoute($routeParameter)
    {
        return $this->getRoute($this->showRoute.'/'.$routeParameter);
    }
    public function getEditRoute($routeParameter)
    {
        $editRoute = $this->createEditRoute($routeParameter);
        return $this->getRoute($editRoute);
    }
    public function getRoute($route, $parameters = null)
    {
       return (isset($parameters))? $this->call('GET', $route, $parameters): $this->call('GET', $route);
    }
    public function createEditRoute($routeParameter)
    {
        $breakRoute = explode($this->editRouteDelimeter, $this->editRoute);
        return $breakRoute[0] . $routeParameter . $breakRoute[1];
    }



    public function getSubjectModelClassName()
    {
        return $this->externalService->getSubjectModelClassName();
    }

    public function isSubjectModelInstance($potentialModel)
    {
        return $this->externalService->isSubjectModelInstance($potentialModel);
    }

    public function getSubjectModelAttributes()
    {
        return $this->externalService->getSubejctModelAttributes();
    }

}