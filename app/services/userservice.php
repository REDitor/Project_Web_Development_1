<?php
require __DIR__ . '/../repositories/userrepository.php';

class UserService
{
    public function getByUsername($username) {
        $repository = new UserRepository();
        $user = $repository->getByUsername($username);
        return $user;
    }

    public function insertUser($user) {
        $repository = new UserRepository();
        $repository->insertUser($user);
    }
}