<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 *@covers Email
 */
final class EmailTest extends TestCase
{
	public function testCanBeUsedAsString(): void
	{
		$this->assertEquals(true,Email::validate('Abc@example.com'));
	}
}
