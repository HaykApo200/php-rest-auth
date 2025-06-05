<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;
use App\Exceptions\UserExistsException;
use App\Exceptions\ValidationException;
use Exception;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function register(string $email, string $password): array
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new ValidationException("Invalid email format");
        }

        if (strlen($password) < 6) {
            throw new ValidationException("Password must be at least 6 characters");
        }

        $existing = $this->userModel->findByEmail($email);
        if ($existing) {
            throw new UserExistsException("Email already exists");
        }

        $created = $this->userModel->createUser($email, $password);
        if (!$created) {
            throw new \Exception("User could not be created");
        }

        return ['status' => 'success', 'message' => 'User created'];
    }

    public function login(string $email, string $password): array
    {
        $user = $this->userModel->findByEmail($email);

        if (!$user) {
            throw new ValidationException("User not found");
        }

        if (!password_verify($password, $user['password_hash'])) {
            throw new ValidationException("Invalid credentials");
        }

        return ['message' => 'Login successful'];
    }
}
