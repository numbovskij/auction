<?php

declare(strict_types=1);

namespace App\Auth\Entity\User;

use DateTimeImmutable;

class User
{
    public function __construct(
        private Id $id,
        private DateTimeImmutable $data,
        private Email $email,
        private string $passwordHash,
        private ?Token $joinConfirmToken = null
    )
    {
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getData(): DateTimeImmutable
    {
        return $this->data;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function getJoinConfirmToken(): ?Token
    {
        return $this->joinConfirmToken;
    }
}