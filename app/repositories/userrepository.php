<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class UserRepository extends Repository {
    function getByUsernameAndPassword($username, $password) {
        try {
            $stmt = $this->connection->prepare("SELECT userId, username, password, email 
                                                FROM users 
                                                WHERE username=$username
                                                AND password=$password");

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            return $stmt->fetch();
        } catch (PDOException $pdeo) {
            echo $pdeo;
        }
    }

    function insertUser($user) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO users (username, password, email)
                                                VALUES (?,?,?)");
            $stmt->execute([$user->getUsername(), $user->getPassword(), $user->getEmail()]);
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }
}