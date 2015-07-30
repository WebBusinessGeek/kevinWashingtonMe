<?php

use \App\DomainLogic\TagDirectory\Tag as Tag;
use \App\DomainLogic\SuperCategoryDirectory\SuperCategory as SuperCategory;
use \Illuminate\Support\Facades\Cache as Cache;
use \App\DomainLogic\CategoryDirectory\Category as Category;
use \App\DomainLogic\SkillDirectory\Skill as Skill;
class PublicPagesController extends \BaseController {


	public $layout = 'publicPages.wrapper';

	public $companiesToReEngageForMeeting = [
		'Insticator',
		'CreativeMMS',
		'Stream',
		'FreeBusy',
		'HackerEarth',
		'VenturePact',
		'RJMetrics',
		'Zivtech',
		'SquishClip',
		'Edgar',
		'Lobster',
		'HubSpot',
		'SoftGravity',
		'MuseumHack'
	];

	public $companiesToReEngageForOffer = [
		'Brian' => 'HubSpot',
		'Yohan' => 'MapTags'
	];

	public $companiesForAcquisitionPresentation = [
		'companyName' => [
			'info' => [
				'roleTitleForURL' => 'roleTitle',
				'roleTitleForUse' => 'Title of the role to use in content',
				'objective1' => 'This is the first objective',
				'objective2' => 'This is the second objective',
				'objective3' => 'This is the third objective',
				'primaryObjective' => 'This will be the primary objective',
				'group1' => 'Title of group1',
				'group2' => 'Title of group2',
				'group1EngagementTitle' => 'This will be a title for engagement content for group 1',
				'group2EngagementTitle' => 'This will be a title for engagement content for group 2',
				'group1DemoDescription' => 'This will be a description of the demo content for group 1',
				'group2DemoDescription' => 'This will be a description of the demo content for group 2',
				'group1ConversionDescription' => 'This will be a description of the conversion content for group1',
				'group2ConversionDescription' => 'This will b ea description of the conversion content for group2'
			]
		],

		'Wedgies' => [
			'info' => [
				'roleTitleForURL' => 'technicalMarketer',
				'roleTitleForUse' => 'Technical Marketer',
				'objective1' => 'Developing and optimizing acquisition channels',
				'objective2' => 'Developing and implementing growth strategies, objectives, and processes.',
				'objective3' => 'Being adaptive and ready to fill voids as the company\'s needs change.',
				'primaryObjective' => 'Grow the Wedgie user base while focusing primarily on paid users.',
				'group1' => 'Team Leads',
				'group2' => 'Marketers',
				'group1EngagementTitle' => '8 Ways your team members can help you achieve your objectives quicker.',
				'group2EngagementTitle' => 'The number 1 reason your free trials are not converting into customers.',
				'group1DemoDescription' => 'Better team engagement, Increased productivity, Faster & more efficient decision making, etc...',
				'group2DemoDescription' => 'Easily collect qualitative/quantitative data from customers, Improve ROI, Increase revenue, etc...',
				'group1ConversionDescription' => 'A teaser page highlighting the benefits of Wedgies but with more persuasive copywriting.',
				'group2ConversionDescription' => 'A teaser page highlighting the benefits of Wedgies but with more persuasive copywriting.'
			]
		],

		'TelTech' => [
			'info' => [
				'roleTitleForURL' => 'Marketing',
				'roleTitleForUse' => 'Marketing',
				'objective1' => 'Developing and optimizing acquisition channels',
				'objective2' => 'Help improve TelTech apps in ways that lead to more conversions.',
				'objective3' => 'Being adaptive and ready to fill voids as the company\'s needs for me change.',
				'primaryObjective' => 'Sell some TelTech apps!',
				'group1' => 'Debt Collectors.',
				'group2' => 'Private Investigators.',
				'group1EngagementTitle' => '8 techniques to make Collection calls that get results!',
				'group2EngagementTitle' => '7 tips of the trade for a successful private investigation career.',
				'group1DemoDescription' => 'Increase call to pick up ratio, collect useful data on targets, etc...',
				'group2DemoDescription' => 'Unlimited number of ways to use SpoofCard to increase chances of success. ',
				'group1ConversionDescription' => 'A teaser page highlighting the benefits of SpoofCard but with more persuasive copywriting.',
				'group2ConversionDescription' => 'A teaser page highlighting the benefits of SpoofCard but with more persuasive copywriting.'
			]
		],

		'Unroole' => [
			'info' => [
				'roleTitleForURL' => 'growthHacker',
				'roleTitleForUse' => 'Growth Hacker',
				'objective1' => 'Developing and optimizing acquisition channels',
				'objective2' => 'Help improve Unroole product in ways that lead to more conversions.',
				'objective3' => 'Being adaptive and ready to fill voids as the company\'s needs for me change.',
				'primaryObjective' => 'Generate leads and conversions!',
				'group1' => 'Marketing Consultants',
				'group2' => 'Web design studios',
				'group1EngagementTitle' => '8 techniques to scale your marketing business.',
				'group2EngagementTitle' => '7 Ways to speed up development and increase revenue.',
				'group1DemoDescription' => 'Empower your marketing reach, commercialize separate models, etc...',
				'group2DemoDescription' => 'Lower development time, increase client base, increase revenue, etc... ',
				'group1ConversionDescription' => 'A teaser page highlighting the benefits of Unroole but with more persuasive copywriting.',
				'group2ConversionDescription' => 'A teaser page highlighting the benefits of Unroole but with more persuasive copywriting.'
			]
		],
		'TeamGantt' => [
			'info' => [
				'roleTitleForURL' => 'marketingLead',
				'roleTitleForUse' => 'Marketing Lead',
				'objective1' => 'Developing and optimizing acquisition channels for TeamGantt project management software',
				'objective2' => 'Help improve product in ways that lead to more conversions.',
				'objective3' => 'Being adaptive and ready to fill voids as the company\'s needs change.',
				'primaryObjective' => 'Generate leads and conversions!',
				'group1' => 'Consultants looking to scale their business',
				'group2' => 'Software development teams',
				'group1EngagementTitle' => '8 Techniques to Scale Your Consulting Business.',
				'group2EngagementTitle' => '7 Tips to Build Your Best Software.',
				'group1DemoDescription' => 'Manage processes, resources, and time.',
				'group2DemoDescription' => 'Produce higher quality software, reduce PM headaches. ',
				'group1ConversionDescription' => 'A teaser page highlighting the benefits of TeamGantt but with more persuasive copywriting.',
				'group2ConversionDescription' => 'A teaser page highlighting the benefits of TeamGantt but with more persuasive copywriting.'
			]
		],
	];


	public function __construct()
	{
		$this->inquiryService = new \App\DomainLogic\InquiryDirectory\InquiryInternalService();
	}

	public function getCacheLimit($days = 5)
	{
		return \Carbon\Carbon::now()->adddays($days);
	}


	/***********************************************************************************************************/
	/*                                         404 Error Page	                 		                    */
	/***********************************************************************************************************/

	public function view404Error()
	{
		$view = View::make('publicPages.404');
		$this->layout->title = 'Your Lost | Kevin Washington Web Developer & Customer Acquisition';
		$this->layout->content = $view->render();
	}




	/***********************************************************************************************************/
	/*                                          Home page                           		                    */
	/***********************************************************************************************************/

	public function viewHome()
	{
		$view = View::make('publicPages.cover');
		$this->layout->title = 'Kevin Washington | Web Developer & Customer Acquisition Specialist';
		return $view;
	}

	/***********************************************************************************************************/
	/*                                          Skills page                           		                    */
	/***********************************************************************************************************/



	public function viewSkills()
	{
		$view = View::make('publicPages.skill');
		$this->layout->title = 'My Skills | Kevin Washington Web Developer & Customer Acquisition Specialist';
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
	/*                                          Connect page                           		                    */
	/***********************************************************************************************************/



	public function viewConnect()
	{
		$view = View::make('publicPages.connect');
		$this->layout->title = 'Let\'s Connect! | Kevin Washington Web Developer & Customer Acquisition Specialist';
		$this->layout->content = $view->render();
	}

	public function postDataConnect()
	{
		$attributes = \Illuminate\Support\Facades\Input::all();
		$potentialInquiry =  $this->inquiryService->store($attributes);

		if($this->inquiryService->isModelInstance($potentialInquiry))
		{
			Mail::send('emails.newInquiry', ['potentialInquiry' => $potentialInquiry], function($message)
			{
				$message->to('hello@kevinwashington.me')->subject('New Inquiry from Main Connect');
			});

			return 'I will plan to reach out to you shortly';
		}


		return $potentialInquiry;
	}




	/***********************************************************************************************************/
	/*                                          Services page                           		                    */
	/***********************************************************************************************************/


	public function viewServices()
	{
		$view = View::make('publicPages.services');
		$this->layout->title = 'My Services  | Kevin Washington Web Developer & Customer Acquisition Specialist';
		$this->layout->content = $view->render();
	}



	/***********************************************************************************************************/
	/*                                          Karma CRM stats page                  		                    */
	/***********************************************************************************************************/

	public function viewKarmaCRMStats()
	{
		$view = View::make('publicPages.karmaStats');
		$this->layout->title = 'Case study with karmaCRM | Kevin Washington Web Developer & Customer Acquisition Specialist';
		$this->layout->content = $view->render();
	}



	/***********************************************************************************************************/
	/*                                         Intro Page	                 		                    */
	/***********************************************************************************************************/

	public function viewIntro()
	{
		$view = View::make('publicPages.intro');
		$this->layout->title = 'Hello I\'m Kevin | Kevin Washington Web Developer & Customer Acquisition Specialist';
		$this->layout->content = $view->render();
	}


	/***********************************************************************************************************/
	/*                                         TMI Page	                 		                    */
	/***********************************************************************************************************/

	public function viewTMI()
	{
		$view = View::make('publicPages.tmi');
		$this->layout->title = 'TMI page | Kevin Washington Web Developer & Customer Acquisition Specialist';
		$this->layout->content = $view->render();
	}



	/***********************************************************************************************************/
	/*                                         TMI Page	                 		                    */
	/***********************************************************************************************************/

	public function viewResume()
	{
		$view = View::make('publicPages.resume');
		$this->layout->title = 'My Resume | Kevin Washington Web Developer & Customer Acquisition Specialist';
		$this->layout->content = $view->render();

	}

	/***********************************************************************************************************/
	/*                                          Body of Work page                           		                    */
	/***********************************************************************************************************/

	public function viewBodyOfWork()
	{
		$view = View::make('publicPages.bodyOfWork');
		$this->layout->title = 'Projects I have been apart of | Kevin Washington Web Developer & Customer Acquisition Specialist';
		$this->layout->content = $view->render();
	}

	/***********************************************************************************************************/
	/*                                         Employment Acquisition Pages                		                    */
	/***********************************************************************************************************/


	public function viewEmploymentEngagementContent()
	{
		$view = View::make('publicPages.employmentAcquisition.engagement');
		$this->layout->title = '11 Traits to look for in your next marketing hire | Kevin Washington Web Developer & Customer Acquisition Specialist';
		$this->layout->content = $view->render();
	}

	public function viewEmploymentDemonstrationContent()
	{
		$view = View::make('publicPages.employmentAcquisition.demonstration');
		$this->layout->title = 'Am I A Good Fit | Kevin Washington Web Developer & Customer Acquisition Specialist';
		$this->layout->content = $view->render();
	}

	public function viewEmploymentConversionContent()
	{
		$view = View::make('publicPages.employmentAcquisition.conversion');
		$this->layout->title = 'Let\'s talk more! | Kevin Washington Web Developer & Customer Acquisition Specialist';
		$this->layout->content = $view->render();
	}

	public function viewEmploymentTOConversionContent()
	{
		$view = View::make('publicPages.employmentAcquisition.conversionTO');
		$this->layout->title = 'Thank you | Kevin Washington Web Developer & Customer Acquisition Specialist';
		$this->layout->content = $view->render();
	}

	public function viewEmploymentConfirmationContent()
	{
		$view = View::make('publicPages.employmentAcquisition.confirmation');
		$this->layout->content = $view->render();
	}



	public function viewDynamicReEngagementForMeeting($companyName)
	{
		if(!in_array($companyName, $this->companiesToReEngageForMeeting))
		{
			return Redirect::action('PublicPagesController@view404Error');
		}
		$view = View::make('publicPages.employmentAcquisition.reEngagementForMeeting');
		$this->layout->title = '5 Things I will bring to team '. $companyName;
		$this->layout->content = $view->render();
	}


	public function viewDynamicReEngagementForOffer($contactName, $companyName)
	{
		if(!isset($this->companiesToReEngageForOffer[$contactName]) || $this->companiesToReEngageForOffer[$contactName] != $companyName)
		{
			return Redirect::action('PublicPagesController@view404Error');
		}
		$view = View::make('publicPages.employmentAcquisition.reEngagementForOffer');
		$this->layout->content = $view->render();
	}

	public function viewDynamicAcquisitionPresentation($roleTitle, $companyName)
	{
		if(!isset($this->companiesForAcquisitionPresentation[$companyName]) || $this->companiesForAcquisitionPresentation[$companyName]['info']['roleTitleForURL'] != $roleTitle)
		{
			return Redirect::action('PublicPagesController@view404Error');
		}
		$view = View::make('publicPages.employmentAcquisition.acquisitionPresentation');
		$this->layout->title = 'Stepping into the ' . $this->companiesForAcquisitionPresentation[$companyName]['info']['roleTitleForUse'] . 'role at '. $companyName . ' | Kevin Washington Web Developer & Customer Acquisition Specialist';
		$this->layout->content = $view->render();
	}

	public function getDataAcquisition($companyName)
	{
		return $this->companiesForAcquisitionPresentation[$companyName];
	}


	public function viewZivtech()
	{
		$view = View::make('publicPages.employmentAcquisition.zivtech');
		$this->layout->title = 'Taking on the project management role at Zivtech';
		$this->layout->content = $view->render();
	}

}

