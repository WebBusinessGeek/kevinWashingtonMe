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



    public function pngIsValid($filename)
    {
        return (exif_imagetype($filename) == IMAGETYPE_PNG);
    }

    public function imageIsValid()
    {

    }












































}