<?php

use \App\DomainLogic\TagDirectory\Tag as Tag;
use \App\DomainLogic\SuperCategoryDirectory\SuperCategory as SuperCategory;
use \Illuminate\Support\Facades\Cache as Cache;
class PublicPagesController extends \BaseController {


	public $layout = 'publicPages.wrapper';


	public function __construct()
	{
		$this->inquiryService = new \App\DomainLogic\InquiryDirectory\InquiryInternalService();
	}

	public function getCacheLimit($days = 5)
	{
		return \Carbon\Carbon::now()->adddays($days);
	}


	/***********************************************************************************************************/
	/*                                          Home page                           		                    */
	/***********************************************************************************************************/

	public function viewHome()
	{
		$view = View::make('publicPages.home');
		$this->layout->content = $view->render();
	}
	public function getDataHome()
	{
		if(!Cache::has('getDataHome'))
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

			$forCache = ['tags' => $tags, 'log' => $log];

			Cache::put('getDataHome', $forCache, $this->getCacheLimit());
			return $forCache;
		}

		return Cache::get('getDataHome');

	}


	/***********************************************************************************************************/
	/*                                          Skills page                           		                    */
	/***********************************************************************************************************/



	public function viewSkills()
	{
		$view = View::make('publicPages.skill');
		$this->layout->content = $view->render();
	}
	public function getDataSkills()
	{
		if(!Cache::has('getDataSkills'))
		{
			$tags = Tag::all();
			foreach($tags as $tag)
			{
				foreach($tag->skills as $skill)
				{
					$skill->images;
					$skill->tools;
				}
			}


			$supercategories = SuperCategory::with('categories.skills')->get();

			$log = \Illuminate\Support\Facades\DB::getQueryLog();
			$forCache = ['tags' => $tags , 'supercategories' => $supercategories, 'log' => $log];

			Cache::put('getDataSkills', $forCache, $this->getCacheLimit());
			return $forCache;
		}
		return Cache::get('getDataSkills');
	}



	/***********************************************************************************************************/
	/*                                          Experience page                           		                    */
	/***********************************************************************************************************/

	public function viewExperiences()
	{
		$view = View::make('publicPages.experience');
		$this->layout->content = $view->render();
	}
	public function getDataExperiences()
	{

		if(!Cache::has('getDataExperiences'))
		{
			$experiences = \App\DomainLogic\ExperienceDirectory\Experience::all();
			foreach($experiences as $experience)
			{
				$experience->images;
			}

			$log = \Illuminate\Support\Facades\DB::getQueryLog();

			$forCache = ['experiences' => $experiences, 'log' => $log];

			Cache::put('getDataExperiences', $forCache, $this->getCacheLimit());

			return $forCache;
		}
		return Cache::get('getDataExperiences');
	}


	/***********************************************************************************************************/
	/*                                          Connect page                           		                    */
	/***********************************************************************************************************/



	public function viewConnect()
	{
		$view = View::make('publicPages.connect');
		$this->layout->content = $view->render();
	}

	public function postDataConnect()
	{
		$attributes = \Illuminate\Support\Facades\Input::all();
		$potentialInquiry =  $this->inquiryService->store($attributes);

		if($this->inquiryService->isModelInstance($potentialInquiry))
		{
//			return \Illuminate\Support\Facades\Redirect::to('/connect')->with('message', 'I will plan to reach out to you shortly.');
			return 'I will plan to reach out to you shortly';
		}
//		return \Illuminate\Support\Facades\Redirect::to('/connect')->with('message', $potentialInquiry);
		return $potentialInquiry;
	}




}


