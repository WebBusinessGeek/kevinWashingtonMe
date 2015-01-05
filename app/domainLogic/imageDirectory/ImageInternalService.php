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

    public function __construct()
    {
        $this->model = new Image();
    }


    /**Stores a new Image resource in images database table if valid credentials are passed.
     * Otherwise returns an error message.
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function store($attributes = array())
    {
        $image = $attributes['image'];

        if($this->imageIsValid($image) && $this->extensionIsValid($image->getClientOriginalExtension(), 'png'))
        {
            $name = ['name' => $attributes['name']];

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
            rename($image->getPathName(),$origLongPath);

            return $this->storeEloquentModelInDatabase($this->addAttributesToNewModel(array_merge($paths, $name), $this->getModelClassName()));
        }
        return $this->sendMessage('Not a valid image');
    }


    /**Returns specified Image resource from database if it exists, otherwise returns an error message.
     * @param $model_id
     * @return string
     */
    public function show($model_id)
    {
        return parent::show($model_id);
    }



    public function update($model_id, $attributes = array())
    {

        $potentialModel = $this->show($model_id);

        if($this->isModelInstance($potentialModel))
        {

            //update logic
        }

        return $potentialModel;
    }



    /**Removes an Image model resource from the database table along with its attached images if the resource exists.
     * Otherwise returns an error message.
     * @param $model_id
     * @return mixed|string
     */
    public function destroy($model_id)
    {
      return parent::destroy($model_id);
    }



    public function index()
    {

    }


    public function uniqueDestroyLogic(Model $model)
    {
        foreach($this->getModelDestroyableAttributes() as $attribute)
        {
            unlink($model->$attribute);
        }
    }
}