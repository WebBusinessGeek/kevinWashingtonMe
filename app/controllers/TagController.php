<?php

class TagController extends \App\Base\BaseExternalService
{

	public $showRoute = 'dashboard/tag';
	public $createRoute = 'dashboard/tag/create';
	public $indexRoute = 'dashboard/tag/';

	public $indexView = 'tag.index';
	public $createView = 'tag.create';
	public $showView = 'tag.show';
	public $editView = 'tag.edit';

	public $indexCollectionVariableName = 'tags';
	public $showInstanceVariable = 'tag';
	public $editInstanceVariable = 'tagForEdit';


	public function __construct()
	{
		$this->internalService = new \App\DomainLogic\TagDirectory\TagInternalService();
	}

}