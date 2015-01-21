<?php

use \App\DomainLogic\TagDirectory\Tag as Tag;
use \App\DomainLogic\SuperCategoryDirectory\SuperCategory as SuperCategory;
class PublicPagesController extends \BaseController {

	public function __construct()
	{
		$this->inquiryService = new \App\DomainLogic\InquiryDirectory\InquiryInternalService();
	}
	public function home()
	{
		$tags = \App\DomainLogic\TagDirectory\Tag::with('skills')->get();
		return $tags;
	}

	public function skills()
	{
		$tags = Tag::with('skills')->get();
		$supercategories = SuperCategory::with('categories.skills')->get();
		return ['tags' => $tags , 'supercategories' => $supercategories];
	}

	public function experiences()
	{

		//need experiences->images
		$experiences = \App\DomainLogic\ExperienceDirectory\Experience::with('image')->get();
		return $experiences;
	}

	public function connect()
	{
		return 'connect View';
	}

	public function inquiryCreate()
	{
		$attributes = \Illuminate\Support\Facades\Input::all();
		return $this->inquiryService->store($attributes);
	}

}
