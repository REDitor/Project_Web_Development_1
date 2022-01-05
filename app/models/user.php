<?php

class User
{
    private int $userId;
    private string $username;
    private string $password;
    private string $email;

    /**
     * @param int $userId
     * @param string $username
     * @param string $password
     * @param string $email
     */
    public function __construct(int $userId, string $username, string $password, string $email)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
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