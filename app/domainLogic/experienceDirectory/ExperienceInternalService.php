<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/12/15
 * Time: 8:16 PM
 */

namespace App\DomainLogic\ExperienceDirectory;


use App\Base\BaseInternalService;

class ExperienceInternalService extends BaseInternalService {

    public function __construct()
    {
        $this->model = new Experience();
    }

}