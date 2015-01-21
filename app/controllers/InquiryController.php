<?php

class InquiryController extends  \App\Base\BaseExternalService {

	public $showRoute = 'dashboard/inquiry';
	public $createRoute = 'dashboard/inquiry/create';
	public $indexRoute = 'dashboard/inquiry/';

	public $indexView = 'inquiry.index';
	public $createView = 'inquiry.create';
	public $showView = 'inquiry.show';
	public $editView = 'inquiry.edit';

	public $indexCollectionVariableName = 'inquiries';
	public $showInstanceVariable = 'inquiry';
	public $editInstanceVariable = 'inquiryForEdit';


	public function __construct()
	{
		$this->internalService = new \App\DomainLogic\InquiryDirectory\InquiryInternalService();
	}

}