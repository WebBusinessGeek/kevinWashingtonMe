<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/8/15
 * Time: 12:57 AM
 */

namespace App\Base;


class InternalServiceConcrete extends InternalService {

    public function __construct()
    {
        $this->model = new ModelConcrete();
    }

}