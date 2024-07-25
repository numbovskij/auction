<?php

declare(strict_types=1);

namespace App\Auth\Test\Unit\Service;

use App\Auth\Service\PasswordHasher;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Auth\Service\PasswordHasher
 */
class PasswordHasherTest extends TestCase
{
    private PasswordHasher $hasher;

    protected function setUp(): void
    {
        parent::setUp();
        $this->hasher = new PasswordHasher(16);
    }

    public function testHash(): void
    {
        $password = 'test';
        $hash = $this->hasher->hash($password);

        self::assertNotEmpty($password);
        self::assertNotEquals($hash, $password);
    }

    public function testHashEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->hasher->hash('');
    }

    public function testValidate(): void
    {
        $password = 'test';
        $hash = $this->hasher->hash($password);

        self::assertTrue($this->hasher->validate($password, $hash));
        self::assertFalse($this->hasher->validate($password, 'habra-kadabra'));
    }
}
