<?php 

/**
* 
*/
class CartHelper{
	
	public static function displaySubtotal($user_id, $contents){
		
		$totalAmount = 0;

		foreach ($contents as $content) {
			
			if ($content->user_id == $user_id) {

				$totalAmount = $totalAmount + ($content->price * $content->quantity);

			}

		}

		echo $totalAmount;
	}

	public static function displayTax($user_id){
		//pore
	}

	public static function displayTotal($user_id){
		//pore
	}
}