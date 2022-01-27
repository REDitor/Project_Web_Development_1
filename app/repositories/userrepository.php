<?php
namespace repositories;

use PDOException;

class UserRepository extends Repository
{
    private string $getIdByUnameAndPassQuery = "SELECT userId FROM users WHERE username=:username AND password=:password";
    private string $getUnameByIdQuery = "SELECT username FROM users WHERE userId = :userId";
    private string $insertUserQuery = "INSERT INTO users (username, password, email) VALUES (?,?,?)";
    private string $getEmailQuery = "SELECT email FROM users WHERE email = :email";
    private string $updatePasswordQuery = "UPDATE users SET users.password = :password WHERE email = :email";

    function getIdByUsernameAndPassword($username, $password) {
        try {

            $stmt = $this->connection->prepare($this->getIdByUnameAndPassQuery);

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
            $stmt = $this->connection->prepare($this->getUnameByIdQuery);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();

            return $stmt->fetchColumn();
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }

    function insertUser($user) {
        try {
            $stmt = $this->connection->prepare($this->insertUserQuery);
            $stmt->execute([$user->getUsername(), $user->getPassword(), $user->getEmail()]);
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }

    function getEmail($email) {
        try {
            $stmt = $this->connection->prepare($this->getEmailQuery);

            $stmt->bindParam(':email', $email);
            $stmt->execute();

            return $stmt->fetchColumn();
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }

    function updatePassword($password, $email) {
        try {
            $stmt = $this->connection->prepare($this->updatePasswordQuery);

            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }
}