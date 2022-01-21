<?php
require __DIR__ . '/../repositories/userrepository.php';

class UserService
{
    private UserRepository $user_repository;

    public function __construct()
    {
        $this->user_repository = new UserRepository();
    }

    public function getIdByUsernameAndPassword($username, $password) {
        return $this->user_repository->getIdByUsernameAndPassword($username, $password);
    }

    public function getUsernameById($userId) {
        return $this->user_repository->getUsernameById($userId);
    }

    public function insertUser($user) {
        $repository = new UserRepository();
        $repository->insertUser($user);
    }
}