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
use Illuminate\Support\Facades\View;

abstract class ExternalServiceTestLibrary extends MasterTestLibrary {

    public $externalService;

    public $loginRedirectUrl = 'http://localhost/login';
    public $paginationClass = 'Illuminate\Pagination\Paginator';
    public $instanceClass = '';
    public $unauthenticatedRedirectionRoute = 'login';
    public $messageVariableName = 'message';
    public $badIdExpectedErrorMessage = 'Model not found.';
    public $destroySuccessMessage = 'Resource deleted successfully.';


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

    public $storeRoute;
    public $storeAfterPostView;
    public $badAttributesForStoreMessage = 'Invalid attributes sent to store method.';


    public $updateRoute;
    public $updateAfterPutView;
    public $badAttributesForUpdateMessage = 'Invalid attributes sent to update method.';

    public $destroyRoute;
    public $destroyAfterDeleteView;

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
    public function assertLocationIsAIndexRoute($location)
    {
        $this->assertEquals($this->removeFromRoute($this->indexRoute, $location)[1], null);
    }
    public function removeFromRoute($delimiter, $route)
    {
        return explode($delimiter, $route);
    }



    public function assertLocationIsAEditRoute($location)
    {
        $this->assertTrue(!strpos($location, 'edit') === false);
    }










    public function GETIndexRoute()
    {
        return $this->GETRoute($this->indexRoute);
    }
    public function GETCreateRoute()
    {
        return $this->GETRoute($this->createRoute);
    }
    public function GETShowRoute($id)
    {
        return $this->GETRoute($this->showRoute.'/'.$id);
    }
    public function GETEditRoute($id)
    {
        $editRoute = $this->createEditRoute($id);
        return $this->GETRoute($editRoute);
    }

    public function createEditRoute($id)
    {
        $breakRoute = explode($this->editRouteDelimeter, $this->editRoute);
        return $breakRoute[0] . $id . $breakRoute[1];
    }



    public function PUTUpdateRoute($id, $attributes)
    {
        return $this->PUTRoute($this->updateRoute.'/'.$id, $attributes);
    }
    public function PUTRoute($route, $attributes)
    {
        return $this->call('PUT', $route, $attributes);
    }



    public function POSTStoreRoute($attributes)
    {
        return $this->POSTRoute($this->storeRoute, $attributes);
    }
    public function POSTRoute($route, $attributes)
    {
        return $this->call('POST', $route, $attributes);
    }


    public function DELETEDestroyRoute($id)
    {
        $route = $this->destroyRoute.'/'.$id;
        return $this->DELETERoute($route);
    }
    public function DELETERoute($route)
    {
        return $this->call('DELETE', $route);
    }



    public function getViewMessage($redirectResponse)
    {
       return $redirectResponse->getSession()->get($this->messageVariableName);
    }

    public function getShowInstanceVariableFromRedirectResponse($redirectResponse)
    {
        return $redirectResponse->getSession()->get($this->showInstanceVariable);
    }

    public function getEditInstanceVariableFromRedirectResponse($redirectResponse)
    {
        return $redirectResponse->getSession()->get($this->showInstanceVariable);

    }








    public function getIndexInstanceVariableFromView($view)
    {
        return $view[$this->indexCollectionVariable];
    }

    public function getShowInstanceVariableFromView($view)
    {
        return $view[$this->showInstanceVariable];
    }

    public function getEditInstanceVariableFromView($view)
    {
        return $view[$this->editInstanceVariable];
    }



    public function getResponseLocation($response)
    {
        return $response->headers->get('Location');
    }








    public function getSubjectModelSingleOwnerClassName()
    {
        return $this->externalService->getSubjectModelSingleOwnerClassName();
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
        return $this->externalService->getSubjectModelAttributes();
    }


    public function getAttributeFormatsForSubjectModel()
    {
        return $this->externalService->getAttributeFormatsForSubjectModel();
    }


    public function createSubjectModelInstance()
    {
        $className = $this->getSubjectModelClassName();
        $subjectModel = $className::create([]);
        return $subjectModel;
    }

    public function getSubjectModelFromDatabase($id)
    {
        $className = $this->getSubjectModelClassName();
        $subjectModel = $className::find($id);
        return $subjectModel;
    }

    public function simulateAttributesForSubjectModel($goodOrBad)
    {
        $attributeFormatsOnSubjectModel = $this->getAttributeFormatsForSubjectModel();

        $attributesToReturn = [];
        foreach($attributeFormatsOnSubjectModel as $attributeName => $attributeFormat)
        {
            $fakedFormat = $this->fakeFormat($attributeFormat, $goodOrBad);
            $attributesToReturn[$attributeName] = $fakedFormat;

            ($goodOrBad != 'bad')?: $attributesToReturn['badAttributeName'] = 'bad';
        }
        return $attributesToReturn;
    }

    public function subjectModelHasOwner()
    {
        $existValues = $this->getExistValuesForSubjectModel();

        $counter = 0;

        foreach($existValues as $checkIfExistsIsSet)
        {
            if($checkIfExistsIsSet != null)
            {
                $counter++;
            }
        }
        return($counter > 0)? true :false;
    }

    public function getExistValuesForSubjectModel()
    {
        return $this->externalService->getExistValuesForSubjectModel();
    }

    public function destroySubjectModelOwner($subjectModel)
    {
        $ownerAttributeName = $this->getAttributeThatRepresentsOwner();
        $ownerId = $subjectModel->$ownerAttributeName;
        $ownerClassName = $this->getSubjectModelSingleOwnerClassName();
        $ownerClassName::destroy($ownerId);
    }

    public function getAttributeThatRepresentsOwner()
    {
        $existValues = $this->getExistValuesForSubjectModel();
        $arrayToReturn = [];

        foreach($existValues as $attributeName => $checkIfExistIsSet)
        {
            if($checkIfExistIsSet != null)
            {
                array_push($arrayToReturn, $attributeName);
            }
        }
        if(count($arrayToReturn) >= 2)
        {
            throw new \Exception('Subject model has more than one owner');
        }
        return $arrayToReturn[0];
    }

    public function fakeFormat($format, $goodOrBad)
    {
        $dynamicMethodToCall = 'fake'.ucfirst($goodOrBad).ucfirst($format).'Attribute';
        return $this->$dynamicMethodToCall();
    }


    public function simulateBadIDForSubjectModel()
    {
        return 'aaa';
    }




}