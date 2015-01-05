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

    abstract public function index();

    abstract public function store($credentialsOrAttributes =[]);

    public function update($model_id, $attributes = array())
    {

        $potentialModel = $this->show($model_id);

        if($this->isModelInstance($potentialModel))
        {

            $validatedAttributes = $this->uniqueValidationLogic($attributes);

            if(is_array($validatedAttributes))
            {
                $this->uniqueUpdateLogic();
                return $this->storeEloquentModelInDatabase($this->addAttributesToExistingModel($potentialModel, $validatedAttributes));
            }
          return $validatedAttributes;
        }

        return $potentialModel;
    }


    /**Parent show function. Retrieves and returns a specified instance if it exists.
     * Otherwise returns error message.
     * @param $model_id
     * @return string
     */
    public function show($model_id)
   {
       return $this->getEloquentModelFromDatabase($model_id, $this->getModelClassName());
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
            $this->uniqueDestroyLogic($potentialModel);
            return $this->deleteEloquentModelFromDatabase($potentialModel, $this->getModelClassName());
        }

        return $potentialModel;
    }

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
       return (
        $this->modelAcceptsAttributes($attributes, $this->getModelAttributes()) &&
        $this->modelNonNullableAttributesSet($attributes, $this->getModelAttributes()) &&
        $this->checkMajorFormatsAreValid($attributes, $this->getModelAttributes()) &&
        $this->avoidDuplicationOfUniqueData($attributes, $this->getModelAttributes(), $this->getModelClassName())
       == true ) ? :false;

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



    public function uniqueDestroyLogic(Model $model)
    {
        return '';
    }

    public function uniqueValidationLogic($attributes = array())
    {
        return $attributes;
    }

    public function uniqueUpdateLogic()
    {
        return '';
    }




}