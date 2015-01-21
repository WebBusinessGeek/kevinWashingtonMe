<?php

class SkillController extends \App\Base\BaseExternalService {

	public $showRoute = 'dashboard/skill';
	public $createRoute = 'dashboard/skill/create';
	public $indexRoute = 'dashboard/skill/';

	public $indexView = 'skill.index';
	public $createView = 'skill.create';
	public $showView = 'skill.show';
	public $editView = 'skill.edit';

	public $indexCollectionVariableName = 'skills';
	public $showInstanceVariable = 'skill';
	public $editInstanceVariable = 'skillForEdit';


	public function __construct()
	{
		$this->internalService = new \App\DomainLogic\SkillDirectory\SkillInternalService();
	}

}