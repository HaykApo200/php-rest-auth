<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\User;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function register(string $email, string $password) 
    {
        // $existing = $this->userModel->findByEmail($email);
        // if ($existing) {
        //     return ['status' => 'error']
        // }

    }
}