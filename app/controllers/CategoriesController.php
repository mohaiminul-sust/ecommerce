<?php

class CategoriesController extends \BaseController {




	public function __construct(){
		parent::__construct();
		// $this->beforeFilter('csrf', ['on'=>'post']);
	}
	
	public function index()
	{
		return View::make('categories.index')->withCategories(Category::all());
	}

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