<?php 

/**
* 
*/
class UsersTableSeeder extends Seeder{
	
	public function run(){

		$user = new User;
		
		$user->firstname = 'Mohaiminul';
		$user->lastname = 'Islam';
		$user->email = 'mohaiminul.sust@csesociety.org';
		$user->password = Hash::make('admindev');
		$user->telephone = '01714460390';
		$user->admin = 1;
		
		$user->save();	
	}
}