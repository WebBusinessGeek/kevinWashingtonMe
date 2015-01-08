<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/6/15
 * Time: 6:19 PM
 */

namespace App\DomainLogic\SuperCategoryDirectory;


use App\Base\BaseInternalService;

class SuperCategoryInternalService extends BaseInternalService {

    public function __construct()
    {
        $this->model = new SuperCategory();
    }
}