<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/15/15
 * Time: 11:50 AM
 */

namespace App\Base;


class ConcreteExternalServiceTestLibrary extends ExternalServiceTestLibrary {

    public function __construct()
    {
        $this->externalService = new ConcreteExternalService();
    }
}