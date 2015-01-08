<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/7/15
 * Time: 7:46 PM
 */

namespace App\DomainLogic\SkillDirectory;


use App\Base\BaseInternalService;

class SkillInternalService extends BaseInternalService {

    public function __construct()
    {
        $this->model = new Skill();
    }


}