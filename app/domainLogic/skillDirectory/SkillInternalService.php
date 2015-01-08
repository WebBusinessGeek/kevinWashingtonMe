<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 7:46 PM
 */

namespace App\DomainLogic\SkillDirectory;


use App\Base\InternalService;

class SkillInternalService extends InternalService {

    public function __construct()
    {
        $this->model = new Skill();
    }


}