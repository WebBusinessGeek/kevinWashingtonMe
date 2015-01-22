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
		return View::make('publicPages.home');
	}

	public function ajaxHome()
	{
//		$tags = Tag::with('skills')->get();
//		return $tags;
		$tags = Tag::all();

		$result = [];
		$array = [];
		foreach($tags as $tag)
		{
				$skills = $tag->skills;
				array_push($array, $skills);
//
		}
//		return ['tags' => $tags, 'skills' => $skills];
		return $tags;
//		return 'hello';
	}




	public function skills()
	{
		$tags = Tag::with('skills')->get();
		$supercategories = SuperCategory::with('categories.skills')->get();

		return ['tags' => $tags , 'supercategories' => $supercategories];
//		return View::make('publicPages.skill')->with(['tags' => $tags , 'supercategories' => $supercategories]) ;
	}

	public function experiences()
	{

		$experiences = \App\DomainLogic\ExperienceDirectory\Experience::with('image')->get();

		return View::make('publicPages.experience')->with('experiences', $experiences);

	}

	public function connect()
	{
		return View::make('publicPages.connect');
	}

	public function inquiryCreate()
	{
		$attributes = \Illuminate\Support\Facades\Input::all();
		$potentialInquiry =  $this->inquiryService->store($attributes);

		if($this->inquiryService->isModelInstance($potentialInquiry))
		{
			return \Illuminate\Support\Facades\Redirect::to('/connect/success')->with('message', 'I will plan to reach out to you shortly.');
		}
		return \Illuminate\Support\Facades\Redirect::to('/connect')->with('message', $potentialInquiry);
	}

}
