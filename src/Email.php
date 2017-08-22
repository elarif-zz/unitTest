<?php

declare(strict_types=1);

final class Email
{

	public static function validate($email):bool{
		$result = Email::hasOnlyOneArobase($email);
		$result = Email::hasArobase($email);
		return $result;
	}

	private static function hasArobase($email):bool{
		$result = (strpos($email,'@') !==false);
		return $result;
	}

	private static function hasOnlyOneArobase($email):bool{
		$result = (substr_count($email,'@') !== 0);
		return $result;

	}
}
