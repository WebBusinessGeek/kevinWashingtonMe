<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/31/14
 * Time: 2:59 PM
 */

namespace App\Polymorphic;


use Symfony\Component\HttpFoundation\File\UploadedFile;

trait ResourceHandlingTrait {



    /**Returns short and full paths after resizing an uploaded image.
     * Throws exception if bad argument is supplied for $image.
     * @param UploadedFile $image
     * @param $width
     * @param $height
     * @param $directoryToStore
     * @return array
     */
    public function resizeAndStoreImage(UploadedFile $image, $width, $height, $directoryToStore)
    {
        $storageDirectory = public_path().'/'.$directoryToStore.'/';
        $pathToImage = $storageDirectory. $image->getClientOriginalName();
        \Image::make($image)->resize($width, $height)->save($pathToImage);

        $paths = [
            'fullPath' => $pathToImage,
            'shortPath' => explode('/public/', $pathToImage)[1]
        ];

        return $paths;
    }

}