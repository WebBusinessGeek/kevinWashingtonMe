<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/5/15
 * Time: 5:16 PM
 */

namespace App\DomainLogic\ToolDirectory;


use App\Base\BaseInternalService;
use App\DomainLogic\TagDirectory\Tag;

class ToolInternalService extends BaseInternalService{


    public function __construct()
    {
        $this->model = new Tool();
    }




}