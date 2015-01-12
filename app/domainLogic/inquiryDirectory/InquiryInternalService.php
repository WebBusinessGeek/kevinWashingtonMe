<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 1/12/15
 * Time: 5:17 PM
 */

namespace App\DomainLogic\InquiryDirectory;


use App\Base\BaseInternalService;

class InquiryInternalService extends BaseInternalService {

    public function __construct()
    {
        $this->model = new Inquiry();
    }

}