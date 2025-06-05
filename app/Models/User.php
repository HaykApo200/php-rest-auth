<?php

declare(strict_types=1);

namespace App\Models;

use PDO;
use App\Config\Database;

class User 
{
    private $conn;

    public function __construct() 
    {
        $this->conn = Database::connect();
    }
    
    public function createUser(string $email, string $password): bool
    {
        $sql = "INSERT INTO users (email, password_hash) VALUES (:email, :password_hash)";
        $stmt = $this->conn->prepare($sql);

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        return $stmt->execute([
            ':email' => $email,
            ':password_hash' => $password_hash,
        ]);
    }

    public function findByEmail(string $email): ?array
    {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':email' => $email
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    } 
}
