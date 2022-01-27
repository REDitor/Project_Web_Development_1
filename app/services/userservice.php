<?php

namespace services;

use repositories\UserRepository;

class UserService
{
    private UserRepository $user_repository;

    public function __construct()
    {
        $this->user_repository = new UserRepository();
    }

    public function getIdByUsernameAndPassword($username, $password)
    {
        return $this->user_repository->getIdByUsernameAndPassword($username, $password);
    }

    public function getUsernameById($userId)
    {
        return $this->user_repository->getUsernameById($userId);
    }

    public function insertUser($user)
    {
        $this->user_repository->insertUser($user);
    }

    public function getEmail($email)
    {
        return $this->user_repository->getEmail($email);
    }

    public function updatePassword($password, $email) {
        $this->user_repository->updatePassword($password, $email);
    }
}