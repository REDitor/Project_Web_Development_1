<?php

class User
{
    private int $id;
    private string $username;
    private string $password;
    private string $email;
    private $watchLists;

    /**
     * @param int $id
     * @param string $username
     * @param string $password
     * @param string $email
     */
    public function __construct(int $id, string $username, string $password, string $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->watchLists = [];
    }
}