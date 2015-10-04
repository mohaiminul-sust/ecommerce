<?php 

/**
*  Cart Utility Class
*/
class CartUtil {
	

	public static function linkMatch($selfLink, $prevLink){
		
		// $genLink = "";

		if($prevLink == $selfLink){

			return URL::route('homeroute');

		}else{

			return $prevLink;

		}


		

	}


}