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
use Symfony\Component\HttpFoundation\File\UploadedFile;

class TraitConcrete {

    use AuthorizationTrait, AuthenticationTrait,
         RepositoryTrait, ResponderTrait, ValidatorTrait;



























































}