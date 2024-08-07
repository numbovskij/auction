<?php

declare(strict_types=1);

namespace App\Auth\Test\Unit\Entity\User\User\JoinByEmail;

use App\Auth\Entity\User\Email;
use App\Auth\Entity\User\Id;
use App\Auth\Entity\User\Token;
use App\Auth\Entity\User\User;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

/**
 * @covers \App\Auth\Entity\User\User
 */
class RequestTest extends TestCase
{
    public function testRequest(): void
    {
        $user = new User(
            $id = Id::generate(),
            $data = new DateTimeImmutable(),
            $email = new Email('mail@example.com'),
            $hash = 'hash',
            $token = new Token(Uuid::uuid4()->toString(), new DateTimeImmutable()),
        );

        self::assertEquals($id, $user->getId());
        self::assertEquals($data, $user->getData());
        self::assertEquals($email, $user->getEmail());
        self::assertEquals($hash, $user->getPasswordHash());
        self::assertEquals($token, $user->getJoinConfirmToken());
    }
}