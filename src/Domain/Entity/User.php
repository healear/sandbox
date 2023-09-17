<?php

namespace App\Domain\Entity;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class User implements PasswordAuthenticatedUserInterface, UserInterface
{
    private int $id;
    private string $name;
    private string $password;
    private string $email;
    private ?array $roles;

    public function __construct(
    ) {
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setRoles(array $roles): void
    {
        $correctRoles = [];

        foreach ($roles as $role) {
            if (in_array($role, UserRoles::getRoles(), true)) {
                $correctRoles[] = $role;
            }
        }

        $this->roles = $correctRoles;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getRoles(): array
    {
        $roles = $this->roles ?? [];
        $roles[] = UserRoles::USER;

        return array_unique($roles);
    }


    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return $this->name;
    }
}