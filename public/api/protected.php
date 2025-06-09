<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Services\TokenService;

header('Content-Type: application/json');

$headers = getallheaders();
$authHeader = $headers['Authorization'] ?? '';

if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
    $jwt = $matches[1];
    try {
        $tokenService = new TokenService();
        $decoded = $tokenService->validateToken($jwt);
        echo json_encode(['status' => 'success', 'email' => $decoded->email]);
    } catch (Exception $e) {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'Invalid token']);
    }
} else {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Authorization header missing']);
}
