<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/15/15
 * Time: 11:51 AM
 */

namespace App\Base;


class ConcreteExternalService extends BaseExternalService {

    public function __construct()
    {
        $this->internalService = new ConcreteInternalService();
    }

}