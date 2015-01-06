<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/12/14
 * Time: 10:46 AM
 */

namespace App\Base;



use App\Polymorphic\AuthenticationTrait;
use App\Polymorphic\RepositoryTrait;
use App\Polymorphic\ResourceHandlingTrait;
use App\Polymorphic\ResponderTrait;
use App\Polymorphic\ValidatorTrait;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Routing\Exception\MissingMandatoryParametersException;

abstract class InternalService {

    use ValidatorTrait, ResponderTrait,  RepositoryTrait, ResourceHandlingTrait, AuthenticationTrait;

    public $model;

    /**
     *Ensures requirements are set on services and their models.
     */
    public function __construct()
    {
        if($this->model == null || $this->model->modelAttributes = null)
        {
            throw new MissingMandatoryParametersException('No model on class or no attributes on model');
        }
    }


    /****************************************************************************************************************/
    /*                      INDEX - STORE - SHOW - UPDATE - DESTROY ParentMethods                                   */
    /****************************************************************************************************************/



    /**Returns all instances paginated according to the parameter passed as the argument: $paginationCount.
     * @param $paginationCount
     * @return mixed
     */
    public function index($paginationCount)
    {
        $model = $this->getModelClassName();
        return $model::paginate($paginationCount);
    }


    /**Parent store function. Creates and returns a new instance if attributes passed are valid.
     * Otherwise returns an error message.
     * @param array $credentialsOrAttributes
     * @return Model|mixed
     */
    public function store($credentialsOrAttributes =[])
    {
        $modelAttributes = $this->getModelAttributes();

        if( $this->checkMajorFormatsAreValid($credentialsOrAttributes, $modelAttributes) &&
            $this->checkModelAcceptsAttributes($credentialsOrAttributes, $modelAttributes) &&
            /*HOOK*/ $this->checkUniqueValidationLogicAndReturnBoolean($credentialsOrAttributes, $modelAttributes))//HOOK - Implement any validation logic that should be ran by overriding this method in descendant class! Must return a boolean!
        {
            /*HOOK*/ $this->runUniquePreAttributeAddingLogic();//HOOK - Implement any logic that should be ran before adding attributes in by overriding this method in descendant class! Should not return anything for usage!
            /*HOOK*/ $manipulatedAttributes = $this->runUniqueAttributeManipulationLogic($credentialsOrAttributes);//HOOK - Implement any logic that should be ran on the attributes before they are added to a new model by overriding this method on descendant class! Must return $attributes!
            return $this->storeEloquentModelInDatabase($this->addAttributesToNewModel($manipulatedAttributes, $this->getModelClassName()));
        }
        return $this->sendMessage('Invalid attributes sent to store method.');
    }



    /**Parent show function. Retrieves and returns a specified instance if it exists.
     * Otherwise returns error message.
     * @param $model_id
     * @return string
     */
    public function show($model_id)
    {
        $model = $this->getEloquentModelFromDatabase($model_id, $this->getModelClassName());
        return /*HOOK*/ $this->runUniqueLogicBeforeModelIsReturned($model);//HOOK - Implement any logic that should be ran on model before its returned in the descendant class by overriding this method. Method must return the Model to be compatible!
    }



    /**Parent update function. Updates the specified model if it exists and the attributes given are valid.
     * Otherwise will return error message.
     * Allows for 'hook' in for uniqueUpdateLogic and uniqueValidationLogic from descendants that extend this base class.
     * @param $model_id
     * @param array $attributes
     * @return array|Model|string
     */
    public function update($model_id, $attributes = array())
    {
        $potentialModel = $this->show($model_id);

        if($this->isModelInstance($potentialModel))
        {
            $validatedAttributes = /*HOOK*/ $this->runUniqueValidationLogicAndReturnAttributes($attributes);//HOOK - Implement any unique validation logic that should be ran by overriding this method on the descendant class. Should return attributes or error message to be compatible!
            if(is_array($validatedAttributes))
            {
                /*HOOK*/$this->runUniqueUpdateLogic();//HOOK - Implement any unique update logic that should be ran by overriding this method in the descendant class. Should not return anything for usage!
                return $this->storeEloquentModelInDatabase($this->addAttributesToExistingModel($potentialModel, $validatedAttributes));
            }
          return $validatedAttributes;
        }
        return $potentialModel;
    }



    /**Parent destroy function. Removes specified instance from database.
     * Allows children to 'hook into' parent::function by implementing their own uniqueDestroyLogic methods.
     * @param $model_id
     * @return mixed|string
     */
    public function destroy($model_id)
    {
        $potentialModel = $this->show($model_id);
        if($this->isModelInstance($potentialModel))
        {
            /*HOOK*/$this->runUniqueDestroyLogic($potentialModel);//HOOK - Implement any unique destroy logic by overriding this method on the descendant class. Should not return anything for usage!
            return $this->deleteEloquentModelFromDatabase($potentialModel, $this->getModelClassName());
        }

        return $potentialModel;
    }


    /****************************************************************************************************************/
    /*                                           HOOKMethods                                                         */
    /****************************************************************************************************************/



    public function runUniqueDestroyLogic(Model $model)
    {
        return '';
    }

    public function runUniqueValidationLogicAndReturnAttributes($attributes = array())
    {
        return $attributes;
    }

    public function checkUniqueValidationLogicAndReturnBoolean($attributes = array())
    {
        return true;
    }

    public function runUniqueUpdateLogic()
    {
        return '';
    }

    public function runUniquePreAttributeAddingLogic()
    {
        return '';
    }

    public function runUniqueAttributeManipulationLogic($attributes = array())
    {
        return $attributes;
    }


    public function runUniqueLogicBeforeModelIsReturned($model)
    {
        return $model;
    }



    /****************************************************************************************************************/
    /*                                      HelperMethods                                                           */
    /****************************************************************************************************************/




    /**
     * Returns $model's attributes as a multidimensional array.
     * @return mixed
     */
    public function getModelAttributes()
    {
        return $this->model->getSelfModelAttributes();
    }


    /**
     * Return $model's class name.
     * @return mixed
     */
    public function getModelClassName()
    {
        return $this->model->getClassName();
    }

    /**
     * Returns true if all values and attributes are valid, otherwise false.
     * No tests for function directly!
     * @param array $attributes
     * @return bool
     */
    public function checkAttributes($attributes = array())
    {
        $modelAttributes = $this->getModelAttributes();

        return ($this->checkModelAcceptsAttributes($attributes, $modelAttributes) &&
                $this->modelNonNullableAttributesSet($attributes, $modelAttributes) &&
                $this->checkMajorFormatsAreValid($attributes, $modelAttributes) &&
                $this->avoidDuplicationOfUniqueData($attributes, $modelAttributes, $this->getModelClassName()))
            ? : false;

    }

    /**
     * Returns true if passed in Model instance is an actual instance, otherwise false.
     * @param $potentialModel
     * @return bool
     */
    public function isModelInstance($potentialModel)
    {
        return (is_object($potentialModel) && '\\'. get_class($potentialModel) == $this->getModelClassName());
    }

    /**Returns true if $potentialModel is instance of $modelClassName
     * @param $potentialModel
     * @param $modelClassName
     * @return bool
     */
    public function isSpecificModelInstance($potentialModel, $modelClassName)
    {
        return (is_object($potentialModel) && '\\'. get_class($potentialModel) == $modelClassName);

    }


    public function getModelAttributeWithSetting($settingName)
    {
        return $this->model->getAttributeWithSetting($settingName);
    }


    public function getSpecificModelAttributeWithSetting($settingName, $modelClassName)
    {
        $model = $this->createNewModel($modelClassName);
        return $model->getAttributeWithSetting($settingName);
    }


    public function getModelDelimiter()
    {
        return $this->model->getDelimiter();
    }


    public function getModelLoginExpiration()
    {
        return $this->model->getLoginExpiration();
    }


    public function getModelHashAbleAttributes()
    {
        return $this->model->getHashAbleAttributes();
    }


    public function getModelDestroyableAttributes()
    {
        return $this->model->getDestroyableAttributes();
    }






















}