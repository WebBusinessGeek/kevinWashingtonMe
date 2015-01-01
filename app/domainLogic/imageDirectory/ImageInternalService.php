<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/30/14
 * Time: 10:23 AM
 */

namespace App\DomainLogic\ImageDirectory;


use App\Base\InternalService;
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


    /**Returns specified Image resource from database if it exists, otherwise returns an error message.
     * @param $model_id
     * @return string
     */
    public function show($model_id)
    {
        try
        {
            return $this->getEloquentModelFromDatabase($model_id, $this->getModelClassName());
        }
        catch(ModelNotFoundException $e)
        {
            return 'No Model by that id.';
        }
    }

    

    public function update($model_id, $attributes = array())
    {}


    public function destroy($model_id)
    {}


    public function index()
    {

    }
}