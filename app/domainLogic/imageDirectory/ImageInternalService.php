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

                $useWidth = $this->model->$width;
                $useHeight = $this->model->$height;
                $useStorage = $this->model->$directory;

                $longPath = $size.'LongPath';
                $shortPath = $size.'Path';
                $imagePaths = $this->resizeAndStoreImage($image, $useWidth, $useHeight, $useStorage);
                $paths[$longPath] = $imagePaths['fullPath'];
                $paths[$shortPath] = $imagePaths['shortPath'];

            }

            rename($image->getPathName(),$origLongPath);

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