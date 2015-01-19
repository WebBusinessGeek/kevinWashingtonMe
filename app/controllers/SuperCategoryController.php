<?php

use \Illuminate\Support\Facades\Auth as Auth;
use \Illuminate\Support\Facades\Redirect as Redirect;
use \Illuminate\Support\Facades\Input as Input;
class SuperCategoryController extends \App\Base\BaseExternalService {

	public $indexView ='supercategory.index';
	public $indexCollectionVariableName = 'supercategories';

	public $createView = 'supercategory.create';

	public $showRoute = 'dashboard/supercategory';
	public $createRoute = 'dashboard/supercategory/create';

	public $showInstanceVariable = 'supercategory';

	public $showView = 'supercategory.show';
	public $indexRoute = 'dashboard/supercategory/';

	public function __construct()
	{
		$this->internalService = new \App\DomainLogic\SuperCategoryDirectory\SuperCategoryInternalService();
	}




	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(Auth::check())
		{
			$supercategoryForEdit = $this->internalService->show($id);
			if($this->isSubjectModelInstance($supercategoryForEdit))
			{
				return View::make('supercategory.edit')->with('supercategoryForEdit', $supercategoryForEdit);
			}
			return Redirect::to('dashboard/supercategory')->with('message', $supercategoryForEdit);
		}
		return Redirect::to('login')->with('message', 'you need to login first.');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(Auth::check())
		{
			$attributesToSend = Input::all();

			$supercategoryIdCheck = $this->internalService->show($id);
			if($this->isSubjectModelInstance($supercategoryIdCheck))
			{
				$supercategory = $this->internalService->update($id, $attributesToSend);
				if($this->isSubjectModelInstance($supercategory))
				{
					return Redirect::to('dashboard/supercategory/'.$id)->with('supercategory', $supercategory);
				}
				return Redirect::to('dashboard/supercategory/'.$id.'/edit')->with('message', $supercategory);

			}
			return Redirect::to('dashboard/supercategory')->with('message', $supercategoryIdCheck);
		}
		return Redirect::to('login')->with('message', 'you need to login first.');
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Auth::check())
		{

			$supercategoryIdCheck = $this->internalService->show($id);
			if($this->isSubjectModelInstance($supercategoryIdCheck))
			{
				$response = $this->internalService->destroy($id);
				if($response)
				{
					return Redirect::to('dashboard/supercategory')->with('message', 'Resource deleted successfully.');
				}
			}
			return Redirect::to('dashboard/supercategory')->with('message', $supercategoryIdCheck);

		}
		return Redirect::to('login')->with('message', 'you need to login first.');

	}


}
