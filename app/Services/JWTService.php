<?php

declare(strict_types=1);

namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class TokenService
{
    private string $secretKey = 'secretKey';
    private string $alg = 'HS256';

    public function generateToken(string $email): string
    {
        $payload = [
            'iss' => 'http://localhost',
            'aud' => 'http://localhost',
            'iat' => time(),
            'exp' => time() + 3600,
            'email' => $email
        ];

        return JWT::encode($payload, $this->secretKey, $this->alg);
    }

    public function validateToken(string $jwt): object
    {
        return JWT::decode($jwt, new Key($this->secretKey, $this->alg));
    }
}
