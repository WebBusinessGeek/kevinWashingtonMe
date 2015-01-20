<?php

class CategoryController  extends \App\Base\BaseExternalService
{

	public $showRoute = 'dashboard/category';
	public $createRoute = 'dashboard/category/create';
	public $indexRoute = 'dashboard/category/';

	public $indexView = 'category.index';
	public $createView = 'category.create';
	public $showView = 'category.show';
	public $editView = 'category.edit';

	public $indexCollectionVariableName = 'categories';
	public $showInstanceVariable = 'category';
	public $editInstanceVariable = 'categoryForEdit';


	public function __construct()
	{
		$this->internalService = new \App\DomainLogic\CategoryDirectory\CategoryInternalService();
	}

}