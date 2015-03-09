<?php

use \App\DomainLogic\TagDirectory\Tag as Tag;
use \App\DomainLogic\SuperCategoryDirectory\SuperCategory as SuperCategory;
use \Illuminate\Support\Facades\Cache as Cache;
use \App\DomainLogic\CategoryDirectory\Category as Category;
use \App\DomainLogic\SkillDirectory\Skill as Skill;
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
		$view = View::make('publicPages.cover');
		return $view;
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

			$supercategories = SuperCategory::with('categories.skills')->get();

			foreach($supercategories as $supercategory)
			{
				foreach($supercategory->categories as $category)
				{
					foreach($category->skills as $skills)
					{
						$skills->tools;
						$skills->category;

					}
				}
			}


			$categories = Category::with('skills')->get();

			foreach($categories as $category)
			{
				foreach($category->skills as $skill)
				{
					$skill->tools;
					$skill->category;

				}
			}


			$skills = Skill::all();
			foreach($skills as $skill)
			{
				$skill->tools;
				$skill->tags;
				$skill->category;

			}


			$log = \Illuminate\Support\Facades\DB::getQueryLog();
			$forCache = [ 'supercategories' => $supercategories, 'categories' => $categories , 'skills' => $skills, 'log' => $log];

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




	/***********************************************************************************************************/
	/*                                          Services page                           		                    */
	/***********************************************************************************************************/


	public function viewServices()
	{
		$view = View::make('publicPages.services');
		$this->layout->content = $view->render();
	}



	/***********************************************************************************************************/
	/*                                          Karma CRM stats page                  		                    */
	/***********************************************************************************************************/

	public function viewKarmaCRMStats()
	{
		$view = View::make('publicPages.karmaStats');
		$this->layout->content = $view->render();
	}

}


