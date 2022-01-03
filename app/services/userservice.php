<?php
require __DIR__ . '../repositories/userrepository.php';

class UserService
{
    public function getByUsername($username) {
        $repository = new UserRepository();
        return $repository->getByUsername($username);
    }

    public function insertUser($user) {
        $repository = new UserRepository();
        $repository->insertUser($user);
    }
}