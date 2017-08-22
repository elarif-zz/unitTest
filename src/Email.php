<?php

declare(strict_types=1);

class Email
{

	public  function validate($email):bool{
		$result = true;
		if(!($this->hasArobase($email) && $this->hasOnlyOneArobase($email)))
		{
			$result = false;
		}
		return $result;
	}

	private  function hasArobase($email):bool{
		$result = (strpos($email,'@') !==false);
		return $result;
	}

	private  function hasOnlyOneArobase($email):bool{
		$result = (substr_count($email,'@') == 1);
		return $result;
	}
}
