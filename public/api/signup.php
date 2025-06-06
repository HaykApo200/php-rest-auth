<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Controllers\UserController;
use App\Exceptions\ValidationException;
use App\Exceptions\UserExistsException;

header('Content-Type: application/json');

try {
    $data = json_decode(file_get_contents("php://input"), true);
    file_put_contents(__DIR__ . '/debug.txt', print_r($data, true));
    if (!isset($data['email']) || !isset($data['password'])) {
        throw new ValidationException("Missing email or password");
    }

    $controller = new UserController();
    $response = $controller->register($data['email'], $data['password']);

    echo json_encode($response);

} catch (ValidationException $e) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
} catch (UserExistsException $e) {
    http_response_code(409);
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Server error']);
}
