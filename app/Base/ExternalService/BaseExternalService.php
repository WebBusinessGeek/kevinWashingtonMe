<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/12/14
 * Time: 10:46 AM
 */

namespace App\Base;


use App\Base\Framework\APILibrary\Polymorphic\AuthenticationTrait;
use App\Base\Framework\APILibrary\Polymorphic\AuthorizationTrait;
use App\Base\Framework\APILibrary\Polymorphic\ResponderTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

//use Illuminate\View\View;


abstract class BaseExternalService extends \BaseController {

    use ResponderTrait, AuthenticationTrait, AuthorizationTrait;

    protected $model;

    protected $internalService;

    protected $serviceSubject;

    protected $errorSubject = 'Error';

    protected $errorCreationCode = 400;

    protected $successCreationCode = 201;

    public $loginRoute = 'login';
    public $messageVariableName = 'message';
    public $AuthenticationNeededMessage = 'You need to login first.';


    public $indexView;
    public $indexCollectionVariableName;


    public $createView;

    public $showRoute;
    public $createRoute;
    public $showInstanceVariable;

    public function __construct()
    {
        if($this->internalService == null)
        {
            throw new \Exception('Internal Service is not set on the controller! Please set the internal service!');
        }
    }


   public function index($paginationCount = 6)
   {
       if(Auth::check())
       {
           $subjectModels = $this->internalService->index($paginationCount);

           return View::make($this->indexView)->with($this->indexCollectionVariableName, $subjectModels);
       }
       return $this->redirectToLogin();
   }




    public function create()
    {
        if(Auth::check())
        {
            return View::make($this->createView);
        }
        return $this->redirectToLogin();
    }




    public function store()
    {
        if(Auth::check())
        {
            $attributesToSend = Input::all();

            $subjectModel = $this->internalService->store($attributesToSend);

            if($this->isSubjectModelInstance($subjectModel))
            {
                $id = $subjectModel->id;
                return Redirect::to($this->showRoute.'/'.$id)->with($this->showInstanceVariable, $subjectModel);
            }
            return Redirect::to($this->createRoute)->with($this->messageVariableName, $subjectModel);
        }
        return $this->redirectToLogin();
    }





//
//    public function show($id)
//    {
//
//    }
//
//    public function update($id, $attributes = array())
//    {
//
//    }
//
//    public function destroy($id)
//    {
//
//    }


    public function getInternalService()
    {
        return $this->internalService;
    }

    public function getInternalServiceModelClassName()
    {
        return $this->internalService->getModelClassName();
    }

    public function getSuccessCreationCode()
    {
        return $this->successCreationCode;
    }

    public function getErrorCreationCode()
    {
        return $this->errorCreationCode;
    }




    public function redirectToLogin()
    {
        return Redirect::to($this->loginRoute)->with($this->messageVariableName, $this->AuthenticationNeededMessage);
    }

    public function isSubjectModelInstance($potentialModel)
    {
        return $this->internalService->isModelInstance($potentialModel);
    }

    public function getSubjectModelClassName()
    {
        return $this->internalService->getModelClassName();
    }

    public function getSubjectModelAttributes()
    {
        return $this->internalService->getModelAttributes();
    }

    public function getSubjectModelSingleOwnerClassName()
    {
        return $this->internalService->getModelSingleOwnerClassName();
    }

    public function getAttributeFormatsForSubjectModel()
    {
        return $this->internalService->getModelSpecificAttributeValues($this->getSubjectModelAttributes(),'format');
    }
}

