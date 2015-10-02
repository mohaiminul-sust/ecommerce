<?php 

/**
* 
*/
class Promo {
	
	function __construct()
	{
		$flag = 1;
		$promo_id = "";
	}



	public static function getRandProduct($products){

		$product_count = $products->count();

        if($product_count == 0)
            return;

        $randInt = rand(0, $product_count-1);
        $product = $products[$randInt];

        return $product;
		
	}

	public static function getDescription($description){
		
		$subdesc = substr($description, 0, 30);
        $subdesc = substr($subdesc, 0, strrpos($subdesc, ' ')).'...';

		return $subdesc;
	}
}