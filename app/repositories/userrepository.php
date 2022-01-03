<?php
require __DIR__ . '/repository.php';
require __DIR__ . '../models/user.php';

class UserRepository extends Repository
{
    function getByUsername($username) {
        try {
            $stmt = $this->connection->prepare("SELECT userId, username, password, email 
                                                FROM users 
                                                WHERE username=$username");

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            return $stmt->fetch();
        } catch (PDOException $pdeo) {
            echo $pdeo;
        }
    }

    function insertUser($user) {
        try {
            $stmt = $this->connection->prepare("INSERT INTO users (userId, username, password, email)
                                                VALUES (?,?,?,?)");
            $stmt->execute([$user->getId(), $user->getUsername(), $user->getPassword(), $user->getEmail()]);
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }
}