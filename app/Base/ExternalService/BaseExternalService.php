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


abstract class BaseExternalService extends \BaseController {

    use ResponderTrait, AuthenticationTrait, AuthorizationTrait;

    protected $model;

    protected $internalService;

    protected $serviceSubject;

    protected $errorSubject = 'Error';

    protected $errorCreationCode = 400;

    protected $successCreationCode = 201;


    public function __construct()
    {
        if($this->internalService == null)
        {
            throw new \Exception('Internal Service is not set on the controller! Please set the internal service!');
        }
    }

//
//   public function index($paginationCount)
//   {
//
//   }
//
//    public function store($credentialsOrAttributes = [])
//    {
//
//    }
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
}

