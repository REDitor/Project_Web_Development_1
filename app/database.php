<?php

namespace app;

use PDO;
use PDOException;

class Database extends PDO
{
    private static Database $instance;

    public static function getInstance(): Database
    {
        if (empty(self::$instance)) {
            try {
                $dbOptions = self::getConfig();

                $port = $dbOptions['port'];
                $host = $dbOptions['hostname'];
                $name = $dbOptions['name'];
                $user = $dbOptions['username'];
                $password = $dbOptions['password'];
                $charset = 'utf8mb4';

                $dsn = "mysql:host=$host;port=$port;dbname=$name;charset=$charset";

                self::$instance = new Database($dsn, $user, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            } catch (PDOException $pdoe) {
                echo $pdoe->getMessage();
            }
        }
        return self::$instance;
    }

    static function getConfig()
    {
        if (getenv('DATABASE_URL') != "") {
            $herokuDb = parse_url(getenv('DATABASE_URL'));
            $dbopts = [
                'type' => $herokuDb['host'],
                'hostname' => $herokuDb['user'],
                'username' => $herokuDb['user'],
                'password' => $herokuDb['pass'],
                'name' => ltrim($herokuDb['path'], '/')
            ];
        } else {
            $dbopts = [
                'hostname' => $_ENV['PHP_DB_HOST'],
                'port' => 3306,
                'username' => $_ENV['MYSQL_USER'],
                'password' => $_ENV['MYSQL_ROOT_PASSWORD'],
                'name' => $_ENV['MYSQL_DATABASE']
            ];
        }
        return $dbopts;
    }
}