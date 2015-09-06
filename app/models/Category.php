<?php

class Category extends \Eloquent {
	protected $fillable = ['name'];

	public static $rules = ['name'=>'required|min:3'];


	public function product(){
		return $this->hasMany('Product');
	}
}