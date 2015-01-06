<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/6/15
 * Time: 6:19 PM
 */

namespace App\DomainLogic\SuperCategoryDirectory;


use App\Base\InternalService;

class SuperCategoryInternalService extends InternalService {

    public function __construct()
    {
        $this->model = new SuperCategory();
    }
}