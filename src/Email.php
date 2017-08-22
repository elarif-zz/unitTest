<?php

declare(strict_types=1);

final class Email
{

	public static function validate($email):bool{
		if(Email::hasAroBase($email) == false ){
			return false;
		}
		return true;
	}
	
	private static function hasArobase($email){
		return strpos($email,'@');
	}
}
