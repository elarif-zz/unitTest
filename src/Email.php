<?php

declare(strict_types=1);

final class Email
{

	public static function validate($email):bool{
		if(Email::hasOnlyOneArobase($email)){
			return false;
		}
		if(Email::hasAroBase($email) == false ){
			return false;
		}
		return true;
	}
	
	private static function hasArobase($email){
		return strpos($email,'@');
	}

	private static function hasOnlyOneArobase($email){
		return substr_count($email,'@');
	}
}
