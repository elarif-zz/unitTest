<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 *@covers Email
 */

final class EmailTest extends TestCase{
	public function testShouldReturnTrueWhenValidEmail(){
		$validEmails = [    'prettyandsimple@example.com',
			'very.common@example.com',
			'disposable.style.email.with+symbol@example.com',
			'other.email-with-dash@example.com',
			'fully-qualified-domain@example.com.',
			'x@example.com (one-letter local-part)',
			'"very.unusual.@.unusual.com"@example.com',
			'"very.(),:;<>[]\".VERY.\"very@\\ \"very\".unusual"@strange.example.com',
			'example-indeed@strange-example.com',
			'admin@mailserver1'];

		foreach($validEmails as $email){
			$this->assertEquals(true,Email::validate($email));
		}
	}

	public function testShouldReturnFalseWhenThereNoAroBase(){
		$value = 'Abc.example.com';
		$this->assertEquals(false,Email::validate($value));
	}
}
