<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/12/14
 * Time: 12:43 PM
 */

namespace App\Polymorphic;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TraitConcrete {

    use AuthorizationTrait, AuthenticationTrait,
         RepositoryTrait, ResponderTrait, ValidatorTrait;



    public function extensionIsValid($fileExtension, $extension)
    {
        return $fileExtension == $extension;
    }

    public function imageIsValid()
    {

    }




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