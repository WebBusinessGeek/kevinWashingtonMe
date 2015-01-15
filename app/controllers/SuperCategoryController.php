<?php

use \Illuminate\Support\Facades\Auth as Auth;
use \Illuminate\Support\Facades\Redirect as Redirect;
class SuperCategoryController extends \App\Base\BaseExternalService {


	public function __construct()
	{
		$this->internalService = new \App\DomainLogic\SuperCategoryDirectory\SuperCategoryInternalService();
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check())
		{
			$supercategories = $this->internalService->index(6);

			return View::make('supercategory.index')->with('supercategories', $supercategories);
		}
		return Redirect::to('login')->with('message', 'you need to login first.');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 *
	 */
	public function create()
	{
		if(Auth::check())
		{
			return View::make('supercategory.create');
		}
		return Redirect::to('login')->with('message', 'you need to login first.');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
