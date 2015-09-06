<?php

class CategoriesController extends \BaseController {




	public function __construct(){
		$this->beforeFilter('csrf', ['on'=>'post']);
	}
	/**
	 * Display a listing of the resource.
	 * GET /categories
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('categories.index')->withCategories(Category::all());
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /categories/create
	 *
	 * @return Response
	 */
	public function create()
	{
		
		
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /categories
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Category::$rules);

		if($validator->passes()){
			$category = new Category;
			$category->name= Input::get('name');
			$category->save();

			return Redirect::to('admin/categories')->with('message', 'Category Created!');
		}

		return Redirect::to('admin/categories')->with('message', 'Something went wrong!!!')
													->withErrors($validator)->withInput();
	}

	/**
	 * Display the specified resource.
	 * GET /categories/{id}
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
	 * GET /categories/{id}/edit
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
	 * PUT /categories/{id}
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
	 * DELETE /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Category::find($id);

		if($category){
			$category->delete();
			return Redirect::to('admin/categories')->with('message', 'Category Deleted!');
		}

		return Redirect::to('admin/categories')->with('message', 'Something went wrong!!');
	}

}