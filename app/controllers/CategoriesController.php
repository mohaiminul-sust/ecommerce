<?php

class CategoriesController extends BaseController {

	public function __construct(){
		parent::__construct();
		$this->beforeFilter('csrf', ['on'=>'post']);
		$this->beforeFilter('admin');
			
	}
	
	public function index()
	{
		return View::make('categories.index')
			// ->withMessage('Welcome to categories admin panel '.Auth::user()->firstname.' .')
			->withCategories(Category::all());
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), Category::$rules);

		if($validator->passes()){
			$category = new Category;
			$category->name= Input::get('name');
			$category->save();

			return Redirect::to('admin/categories')->withMessage('Category Created!');
		}

		return Redirect::to('admin/categories')
			->withMessage('Something went wrong!!!')
			->withErrors($validator)->withInput();
	}

	
	public function destroy($id)
	{
		$category = Category::find($id);

		if($category){
			$category->delete();
			return Redirect::to('admin/categories')->withMessage('Category Deleted!');
		}

		return Redirect::to('admin/categories')->withMessage('Category can\'t be deleted!!');
	}

}