<?php

class ExperienceController extends \App\Base\BaseExternalService {

	public $showRoute = 'dashboard/experience';
	public $createRoute = 'dashboard/experience/create';
	public $indexRoute = 'dashboard/experience/';

	public $indexView = 'experience.index';
	public $createView = 'experience.create';
	public $showView = 'experience.show';
	public $editView = 'experience.edit';

	public $indexCollectionVariableName = 'experiences';
	public $showInstanceVariable = 'experience';
	public $editInstanceVariable = 'experienceForEdit';


	public function __construct()
	{
		$this->internalService = new \App\DomainLogic\ExperienceDirectory\ExperienceInternalService();
	}

}