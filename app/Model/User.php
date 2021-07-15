<?php

namespace App\Model;

class User
{
    private ?int $id;
    private string $username;
    private ?string $role;
    private string $password;
    private string $email;

    /**
     * User constructor.
     * @param string $username
     * @param string $password
     * @param string $email
     * @param int|null $id
     * @param string|null $role
     */
    public function __construct(

        string $username,
        string $password,
        string $email,
        ?int $id = null,
        ?string $role = null
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->id = $id;
        $this->role = $role;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
