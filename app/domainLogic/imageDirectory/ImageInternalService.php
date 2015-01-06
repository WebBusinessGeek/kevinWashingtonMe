<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/30/14
 * Time: 10:23 AM
 */

namespace App\DomainLogic\ImageDirectory;


use App\Base\InternalService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ImageInternalService extends InternalService{

    /**
     *Set up new image as model
     */
    public function __construct()
    {
        $this->model = new Image();
    }


    /**HOOK into PARENT::DESTROY method for custom destroy logic.
     * @param Model $model
     */
    public function runUniqueDestroyLogic(Model $model)
    {
        foreach($this->getModelDestroyableAttributes() as $attribute)
        {
            unlink($model->$attribute);
        }
    }


    /**HOOK into PARENT::STORE method for custom validation.
     * @param array $attributes
     * @return bool
     */
    public function checkUniqueValidationLogicAndReturnBoolean($attributes = array())
    {
        $image = $attributes['image'];
        return ($this->imageIsValid($image) && $this->extensionIsValid($image->getClientOriginalExtension(),'png'));
    }


    /**HOOK into PARENT::STORE method for custom attribute manipulation
     * @param array $preManipulatedAttributes
     * @return array
     */
    public function runUniqueAttributeManipulationLogic($preManipulatedAttributes = array())
    {
        $image = $preManipulatedAttributes['image'];

        unset($preManipulatedAttributes['image']);

        $origShortPath = $this->model->originalStorage.'/'.$image->getClientOriginalName();
        $origLongPath = public_path().'/'.$origShortPath;

        $paths = [
            'originalLongPath' => $origLongPath,
            'originalPath' => $origShortPath
        ];

        foreach($this->model->imageSizes as $size)
        {
            $width = $size .'Width';
            $height =$size .'Height';
            $directory = $size . 'Storage';

            $imagePaths = $this->resizeAndStoreImage($image, $this->model->$width, $this->model->$height, $this->model->$directory);

            $paths[$size.'LongPath'] = $imagePaths['fullPath'];
            $paths[$size.'Path'] = $imagePaths['shortPath'];
        }

        return array_merge($preManipulatedAttributes, $paths);
    }


    /**HOOK into PARENT::STORE for custom logic to run after attributes are manipulated.
     * @param array $preManipulatedAttributes
     * @param array $manipulatedAttributes
     */
    public function runUniquePOSTAttributeManipulationLogic($preManipulatedAttributes = array(), $manipulatedAttributes = array())
    {
        $image = $preManipulatedAttributes['image'];
        $origLongPath = $manipulatedAttributes['originalLongPath'];
        rename($image->getPathName(),$origLongPath);
    }
}