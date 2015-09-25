<?php 

/**
* 
*/
class UsersController extends BaseController{
	
	public function __construct(){
		parent::__construct();

		// $this->beforeFilter('csrf', ['on'=>'post']);
	}

	public function createForm(){

		return View::make('users.createform');

	}

	public function createAccount(){

		$validator = Validator::make(Input::all(), User::$rules);

		if($validator->passes()){
			$user = new User;
		
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->telephone = Input::get('telephone');
			
			$user->save();	


			return Redirect::to('users/signin')
				->with('message', 'Thank you for creating a new account. Please sign in.');
		}

	return Redirect::to('users/create')
		->with('message', 'Something went wrong!')
		->withErrors($validator)
		->withInput();
	}

	public function signinForm(){

		return View::make('users.signinform');
	}


	public function signinAccount(){

		if(Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')])){

			return Redirect::to('/')->withMessage('Thanks for signing in');
			// return 'voodoo magic';
			
		}

		return Redirect::to('users/signin')->with('message', 'Auth attempt failed!');

	}

	
	public function signoutAccount(){

		if(Auth::logout()){

			return Redirect::to('users/signin')->with('message', 'You have been logged out!');
		}

		return Redirect::to('users/signin')->with('message', 'Auth logout failed!');

	}	

}