<?php 

/**
* 
*/
class Utility {
	
	public function selflinkGen(){
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		return $actual_link; 
	}
}