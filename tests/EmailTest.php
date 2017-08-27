<?php
declare(strict_types=1);
include "vendor/autoload.php";
use PHPUnit\Framework\TestCase;
use QCheck\Generator as Gen;
use QCheck\Quick;

/**
 *@covers Email
 */

final class EmailTest extends TestCase{
	public function testShouldReturnFalseWhenThereNoArobase(){
		$stringsWithoutMail = Gen::forAll(
			[Gen::strings()],
			function($str) {
				$mail = new Email();
				$mail->validate(str_replace("@",' ',$str));
			});
		$result = Quick::check(1000, $stringsWithoutMail);
		$this->assertFalse($result['result']);

	}

}
