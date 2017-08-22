<?php

declare(strict_types=1);

final class Email
{

	public static function validate($email):bool
	{
		HasAroBase($email);
	}
	
	private function HasAroBase($email)
	{
		if(strpos($email,'@') !== false)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
