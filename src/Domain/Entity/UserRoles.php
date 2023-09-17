<?php

namespace App\Domain\Entity;

class UserRoles
{
    public const USER = 'ROLE_USER';
    public const ADMIN = 'ROLE_ADMIN';

    public static function getRoles(): array
    {
        return [
          self::USER,
          self::ADMIN
        ];
    }
}