<?php

declare(strict_types=1);

namespace App\Auth\Entity\User;

use DateTimeImmutable;
use Webmozart\Assert\Assert;

class Token
{
    public function __construct(private string $value, private DateTimeImmutable $expires)
    {
        Assert::uuid($this->value);
        $this->value = mb_strtolower($this->value);
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getExpires(): DateTimeImmutable
    {
        return $this->expires;
    }
}