<?php

declare(strict_types=1);

namespace App\Auth\Service;

use App\Auth\Entity\User\Token;
use DateInterval;
use DateTimeImmutable;
use Ramsey\Uuid\Uuid;

class Tokenizer
{
    public function __construct(private DateInterval $interval)
    {
    }

    public function generate(DateTimeImmutable $date): Token
    {
        return new Token(
            value  : Uuid::uuid4()->toString(),
            expires: $date->add($this->interval),
        );
    }
}