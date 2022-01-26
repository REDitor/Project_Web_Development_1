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

    function getEmail($email) {
        try {
            $stmt = $this->connection->prepare("SELECT email
                                                FROM users
                                                WHERE email = :email");

            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetchColumn();
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }

    function updatePassword($password, $email) {
        try {
            $stmt = $this->connection->prepare("UPDATE users
                                               SET password = :password
                                               WHERE email = :email");

            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }
}