<?php
namespace repositories;

use PDOException;

class UserRepository extends Repository
{
    function getIdByUsernameAndPassword($username, $password) {
        try {

            $stmt = $this->connection->prepare("SELECT userId
                                                FROM users
                                                WHERE username=:username
                                                AND password=:password");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            return $stmt->fetchColumn();

        } catch (PDOException $pdeo) {
            echo $pdeo;
        }
    }

    function getUsernameById($userId) {
        try {
            $stmt = $this->connection->prepare("SELECT username
                                                FROM users
                                                WHERE userId = :userId");
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();

            return $stmt->fetchColumn();
        } catch (PDOException $pdoe) {
            echo $pdoe;
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