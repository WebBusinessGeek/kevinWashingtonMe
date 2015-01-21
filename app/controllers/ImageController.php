<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/30/14
 * Time: 10:24 AM
 */

use App\DomainLogic\ImageDirectory\ImageInternalService;

class ImageController extends  \App\Base\BaseExternalService {

    public $showRoute = 'dashboard/image';
    public $createRoute = 'dashboard/image/create';
    public $indexRoute = 'dashboard/image/';

    public $indexView = 'image.index';
    public $createView = 'image.create';
    public $showView = 'image.show';
    public $editView = 'image.edit';

    public $indexCollectionVariableName = 'images';
    public $showInstanceVariable = 'image';
    public $editInstanceVariable = 'imageForEdit';


    public function __construct()
    {
        $this->internalService = new ImageInternalService();
    }

}