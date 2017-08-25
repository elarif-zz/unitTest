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
	public function testShouldReturnTrueWhenValidEmail(){
		$validEmails = ['prettyandsimple@example.com',
			'very.common@example.com',
			'disposable.style.email.with+symbol@example.com',
			'other.email-with-dash@example.com',
			'fully-qualified-domain@example.com.',
			'x@example.com (one-letter local-part)',
			'"very.unusual.@.unusual.com"@example.com',
			'"very.(),:;<>[]\".VERY.\"very@\\ \"very\".unusual"@strange.example.com',
			'example-indeed@strange-example.com',
			'admin@mailserver1'];

		$mail = $this->createMock(Email::class);
		$mail->method('hasArobase')->willReturn(true);
		$mail->method('hasOnlyOneArobase')->willReturn(true);
		foreach($validEmails as $email){
			$this->assertEquals(true,$mail->validate($email));
		}
	}

	public function testShouldReturnFalseWhenThereNoArobase(){
		$value = 'Abc.example.com';
		$mail = $this->createMock(Email::class);
		$this->assertEquals(false,$mail->validate($value));
	}

	public function testShouldReturnFalseWhenThereMoreThanOneArobase(){
		$value = 'A@b@c@example.com';
		$this->assertEquals(false,$mail->validate($value));
	}

	public function testQuickCheck(){
		$stringsAreNeverNumeric = Gen::forAll(
			[Gen::asciiStrings()],
			function($str) {
				return !is_numeric($str);
			}
		);
		$result = Quick::check(1000, $stringsAreNeverNumeric);
		var_dump($result);
	}

}
