<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/12/14
 * Time: 12:43 PM
 */
//
namespace App\Base\Framework\TestSubjects;



use App\BAse\Framework\APILibrary\Polymorphic\AuthenticationTrait;
use App\Base\Framework\APILibrary\Polymorphic\ValidatorTrait;
use App\Base\Framework\APILibrary\Polymorphic\AuthorizationTrait;
use App\Base\Framework\APILibrary\Polymorphic\RepositoryTrait;
use App\Base\Framework\APILibrary\Polymorphic\ResourceHandlingTrait;
use App\Base\Framework\APILibrary\Polymorphic\ResponderTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class ConcreteTrait {

    use AuthorizationTrait, AuthenticationTrait,
         RepositoryTrait, ResponderTrait, ValidatorTrait, ResourceHandlingTrait;































































}