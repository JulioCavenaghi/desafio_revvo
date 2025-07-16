<?php
require_once __DIR__ . '/../src/config/Database.php';
require_once __DIR__ . '/../src/models/Course.php';
require_once __DIR__ . '/../src/controllers/CourseController.php';

use Controllers\CourseController;

$path = $_SERVER['PATH_INFO'] ?? '/';

$segments = explode('/', trim($path, '/'));

if ($path === '/' || $path === '') {
    echo json_encode([
        'message'   => 'Bem‑vindo à API de Courses',
        'endpoints' => [
            'GET    /courses',
            'GET    /courses/{id}',
            'POST   /courses',
            'PUT    /courses/{id}',
            'DELETE /courses/{id}',
        ]
    ]);
    exit;
}

$_SERVER['REQUEST_URI'] = $path;

$controller = new CourseController();
$controller->processRequest();