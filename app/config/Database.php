<?php

declare(strict_types=1);

namespace App\Config;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database 
{
    public static function connect(): PDO 
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $db_name = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];

        try {
            $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8mb4";
            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }

    }

}
