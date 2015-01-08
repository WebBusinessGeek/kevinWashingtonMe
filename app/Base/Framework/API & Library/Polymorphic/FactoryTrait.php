<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/12/14
 * Time: 10:49 AM
 */

namespace App\Base\Framework\APILibrary\Polymorphic;


use App\Polymorphic\UploadedFile;

trait FactoryTrait {


    /**
     * Returns a new instance of the class name passed in.
     * PHP will throw FATAL ERROR if the class name does not exist.
     * @param $className
     */
    public function createNewModel($className)
    {
      return  $instance = new $className;
    }




    /**Creates a Mock uploaded text file for testing purposes.
     * @param $filename
     * @param $directoryForStorage
     * @param null $textForContent
     * @return resource|UploadedFile
     */
    public function createMockUploadedTextFile($filename, $directoryForStorage, $textForContent = null)
    {
        $ext = 'txt';
        $text = ($textForContent != null) ? $textForContent : 'Some dummy text.';
        $fullPath = public_path().'/'.$directoryForStorage.'/';
        $uploadedString = 'uploaded_';
        $uploadedPath = $fullPath.$uploadedString;

        $file = fopen($fullPath . $filename . '.' .$ext, 'w+');
        fwrite($file, $text);

        rename($fullPath.$filename.'.'.$ext, $uploadedPath.$filename.'.'.$ext);

        $file = new \Symfony\Component\HttpFoundation\File\UploadedFile(
            $uploadedPath.$filename.'.'.$ext,
            $uploadedString.$filename . '.' . $ext,
            'text/plain',
            filesize($uploadedPath.$filename.'.'.$ext)
        );

        return $file;
    }





    /**Creates a mock uploaded image file for testing purposes
     *
     * @param $extension
     * @param $nameOfFile
     * @param $directoryForStorage
     * @return UploadedFile
     */
    public function createMockUploadedImage($extension, $nameOfFile, $directoryForStorage)
    {
        $ext = $extension;
        $filename = $nameOfFile;
        $storageDirectory = public_path(). '/'. $directoryForStorage .'/';
        $extensionMethod = 'image'.$ext;

        $image =imagecreate(300, 300);
        imagecolorallocate($image, 0, 0, 255 );
        $extensionMethod($image, public_path().'/'. $filename . '.' . $ext);
        rename(public_path().'/'. $filename . '.' . $ext, $storageDirectory . $filename . '.' . $ext);

        $file = new \Symfony\Component\HttpFoundation\File\UploadedFile(
            $storageDirectory . $filename . '.' . $ext,
            $filename . '.' . $ext,
            'image/'. $ext,
            filesize($storageDirectory . $filename . '.' . $ext)
        );

//        imagedestroy($image);

        return $file;
    }

}