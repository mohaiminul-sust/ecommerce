<?php 

/**
*  Cart Utility Class
*/
class CartUtil {
	
	public static function linkMatch(){
		$selfLink = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 
		$prevLink = URL::previous();


		if($prevLink == $selfLink){

			return URL::route('homeroute');

		}else{

			return $prevLink;

		}
	}


}