<?php

class ToolController extends \App\Base\BaseExternalService {

	public $showRoute = 'dashboard/tool';
	public $createRoute = 'dashboard/tool/create';
	public $indexRoute = 'dashboard/tool/';

	public $indexView = 'tool.index';
	public $createView = 'tool.create';
	public $showView = 'tool.show';
	public $editView = 'tool.edit';

	public $indexCollectionVariableName = 'tools';
	public $showInstanceVariable = 'tool';
	public $editInstanceVariable = 'toolForEdit';


	public function __construct()
	{
		$this->internalService = new \App\DomainLogic\ToolDirectory\ToolInternalService();
	}


}