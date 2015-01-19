<?php

use \Illuminate\Support\Facades\Auth as Auth;
use \Illuminate\Support\Facades\Redirect as Redirect;
use \Illuminate\Support\Facades\Input as Input;
class SuperCategoryController extends \App\Base\BaseExternalService {

	public $indexView ='supercategory.index';
	public $indexCollectionVariableName = 'supercategories';

	public $createView = 'supercategory.create';

	public $showRoute = 'dashboard/supercategory';
	public $createRoute = 'dashboard/supercategory/create';

	public $showInstanceVariable = 'supercategory';

	public $showView = 'supercategory.show';
	public $indexRoute = 'dashboard/supercategory/';

	public $editView = 'supercategory.edit';
	public $editInstanceVariable = 'supercategoryForEdit';

	public function __construct()
	{
		$this->internalService = new \App\DomainLogic\SuperCategoryDirectory\SuperCategoryInternalService();
	}



}
