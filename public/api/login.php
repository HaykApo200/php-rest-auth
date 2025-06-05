<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\UserController;
use App\Exceptions\ValidationException;

header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['email']) || !isset($data['password'])) {
        throw new ValidationException("Missing email or password");
    }

    $controller = new UserController();
    $response = $controller->login($data['email'], $data['password']);

    echo json_encode($response);
    
} catch (ValidationException $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
