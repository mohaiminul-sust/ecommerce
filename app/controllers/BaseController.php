<?php

class BaseController extends Controller {
	
	// Base construct : To share variables among views
	public function __construct(){
		
		$this->beforeFilter(function(){
			View::share('catnav', Category::all());
		});

	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
