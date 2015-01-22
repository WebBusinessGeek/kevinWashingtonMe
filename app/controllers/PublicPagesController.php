<?php

use \App\DomainLogic\TagDirectory\Tag as Tag;
use \App\DomainLogic\SuperCategoryDirectory\SuperCategory as SuperCategory;
class PublicPagesController extends \BaseController {

	public function __construct()
	{
		$this->inquiryService = new \App\DomainLogic\InquiryDirectory\InquiryInternalService();
	}




	public function viewHome()
	{
		return View::make('publicPages.home');
	}
	public function getDataHome()
	{
		$tags = Tag::all();

		foreach($tags as $tag)
		{
			foreach($tag->skills as $skill)
			{
				$skill->images;
			}
		}
		$log = \Illuminate\Support\Facades\DB::getQueryLog();

		return ['tags' => $tags, 'log' => $log];

	}




	public function viewSkills()
	{
		return View::make('publicPages.skill');
	}
	public function getDataSkills()
	{
		$tags = Tag::all();
		foreach($tags as $tag)
		{
			$tag->skills;
		}
		$supercategories = SuperCategory::with('categories.skills')->get();

		$log = \Illuminate\Support\Facades\DB::getQueryLog();
		return ['tags' => $tags , 'supercategories' => $supercategories, 'log' => $log];
	}



	public function viewExperiences()
	{

		return View::make('publicPages.experience');


	}
	public function getDataExperiences()
	{
		$experiences = \App\DomainLogic\ExperienceDirectory\Experience::with('image')->get();

		$log = \Illuminate\Support\Facades\DB::getQueryLog();

		return ['experiences' => $experiences, 'log' => $log];
	}




	public function viewConnect()
	{
		return View::make('publicPages.connect');
	}

	public function postDataConnect()
	{
		$attributes = \Illuminate\Support\Facades\Input::all();
		$potentialInquiry =  $this->inquiryService->store($attributes);

		if($this->inquiryService->isModelInstance($potentialInquiry))
		{
//			return \Illuminate\Support\Facades\Redirect::to('/connect/success')->with('message', 'I will plan to reach out to you shortly.');
			return ['message' => 'I will plan to contact you shortly'];
		}
		return \Illuminate\Support\Facades\Redirect::to('/connect')->with('message', $potentialInquiry);
	}

}
