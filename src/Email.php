<?php

declare(strict_types=1);

final class Email
{

	public static function validate($email):bool{
		if(hasAroBase($email) == false ){
			return false;
		}
		return true;
	}
	
	private function hasAroBase($email){
		return strpos($email,'@');
	}
}
