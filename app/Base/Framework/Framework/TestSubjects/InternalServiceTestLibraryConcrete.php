<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/8/15
 * Time: 12:56 AM
 */

namespace App\Base;


class InternalServiceTestLibraryConcrete extends InternalServiceTestLibrary{

    public function __construct()
    {
        $this->service = new InternalServiceConcrete();
    }
}