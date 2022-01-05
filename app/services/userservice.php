<?php
require __DIR__ . '/../repositories/userrepository.php';

class UserService
{
    public function getByUsernameAndPassword($username, $password) {
        $repository = new UserRepository();
        return $repository->getByUsernameAndPassword($username, $password);
    }

    public function insertUser($user) {
        $repository = new UserRepository();
        $repository->insertUser($user);
    }
}