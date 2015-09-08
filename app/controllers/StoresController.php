<?php

class StoresController extends \BaseController {

	//csrf
	public function __construct(){
		$this->beforeFilter('csrf', ['on'=>'post']);
	}


	/**
	 * Display a listing of the resource.
	 * GET /stores
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('stores.index')->withProducts(Product::take(4)->orderBy('created_at', 'DESC')->get());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /stores/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /stores
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /stores/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('stores.show')->withProduct(Product::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /stores/{id}/edit
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
	 * PUT /stores/{id}
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
	 * DELETE /stores/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}