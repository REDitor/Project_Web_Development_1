<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class UserRepository extends Repository
{
    function getByUsernameAndPassword($username, $password)
    {
        try {

            $stmt = $this->connection->prepare("SELECT userId, username, password, email
                                                FROM users
                                                WHERE username=:username
                                                AND password=:password");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() == 1 && !empty($row)) {
                $user = new User();
                $user->setUserId($row['userId']);
                $user->setUsername($row['username']);
                $user->setPassword($row['password']);
                $user->setEmail($row['email']);

                return $user;
            }

        } catch (PDOException $pdeo) {
            echo $pdeo;
        }
    }

    function insertUser($user)
    {
        try {
            $stmt = $this->connection->prepare("INSERT INTO users (username, password, email)
                                                VALUES (?,?,?)");
            $stmt->execute([$user->getUsername(), $user->getPassword(), $user->getEmail()]);
        } catch (PDOException $pdoe) {
            echo $pdoe;
        }
    }
}