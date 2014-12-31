<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/30/14
 * Time: 10:23 AM
 */

namespace App\DomainLogic\ImageDirectory;


use App\Base\InternalService;

class ImageInternalService extends InternalService{

    public function __construct()
    {
        $this->model = new Image();
    }

    public function store($attributes = array())
    {
        $image = $attributes['image'];

        if($this->imageIsValid($image) && $this->extensionIsValid($image->getClientOriginalExtension(), 'png'))
        {
            $name = ['name' => $attributes['name']];

            $paths = ['originalPath' => explode('/public/',$image->getPathName())[1],];

            foreach($this->model->imageSizes as $size)
            {
                $width = $this->model->$size.'Width';
                $height = $this->model->$size.'Height';
                $directory = $this->model->$size. 'Storage';
                $paths[$size.'Path'] = $this->resizeAndStoreImage($image, $width, $height, $directory)['shortPath'];
            }

           return $this->storeEloquentModelInDatabase($this->addAttributesToExistingModel($this->addAttributesToNewModel($paths, $this->getModelClassName()),$name));
        }

        return $this->sendMessage('Not a valid image');
    }


    public function show($model_id)
    {}

    public function update($model_id, $attributes = array())
    {}


    public function destroy($model_id)
    {}


    public function index()
    {

    }
}