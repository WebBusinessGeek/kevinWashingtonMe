<?php

use \Illuminate\Support\Facades\Auth as Auth;
use \Illuminate\Support\Facades\Redirect as Redirect;
use \Illuminate\Support\Facades\Input as Input;
class SuperCategoryController extends \App\Base\BaseExternalService {

	public $showRoute = 'dashboard/supercategory';
	public $createRoute = 'dashboard/supercategory/create';
	public $indexRoute = 'dashboard/supercategory/';

	public $indexView ='supercategory.index';
	public $createView = 'supercategory.create';
	public $showView = 'supercategory.show';
	public $editView = 'supercategory.edit';

	public $indexCollectionVariableName = 'supercategories';
	public $showInstanceVariable = 'supercategory';
	public $editInstanceVariable = 'supercategoryForEdit';



	public function __construct()
	{
		$this->internalService = new \App\DomainLogic\SuperCategoryDirectory\SuperCategoryInternalService();
	}



}
