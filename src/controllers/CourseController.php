<?php
namespace Controllers;

use Config\Database;
use Models\Course;

class CourseController {
    private $db;
    private $course;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->course = new Course($this->db);
        header('Content-Type: application/json; charset=UTF-8');
    }

    public function processRequest() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri    = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $parts  = explode('/', trim($uri, '/'));

        if (trim($_SERVER['REQUEST_URI'], '/') === '') {
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
            return;
        }

        if ($parts[0] !== 'courses') {
            http_response_code(404);
            echo json_encode(['message' => 'Resource not found']);
            exit;
        }

        $id = $parts[1] ?? null;
        if ($id) {
            $this->course->id = (int)$id;
        }

        switch ($method) {
            case 'GET':
                if ($id) {
                    $this->getOne();
                } else {
                    $this->getAll();
                }
                break;

            case 'POST':
                $this->create();
                break;

            case 'PUT':
                $this->update();
                break;

            case 'DELETE':
                $this->delete();
                break;

            default:
                http_response_code(405);
                echo json_encode(['message' => 'Method Not Allowed']);
        }
    }

    private function getAll() {
        $courses = $this->course->readAll();
        echo json_encode($courses);
    }

    private function getOne() {
        $course = $this->course->readOne();
        if ($course) {
            echo json_encode($course);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Course not found']);
        }
    }

    private function create() {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->course->title       = $data['title']       ?? null;
        $this->course->image       = $data['image']       ?? null;
        $this->course->description = $data['description'] ?? null;

        if ($this->course->create()) {
            http_response_code(201);
            echo json_encode(['message' => 'Course created', 'id' => $this->course->id]);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Unable to create course']);
        }
    }

    private function update() {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->course->title       = $data['title']       ?? $this->course->title;
        $this->course->image       = $data['image']       ?? $this->course->image;
        $this->course->description = $data['description'] ?? $this->course->description;

        if ($this->course->update()) {
            echo json_encode(['message' => 'Course updated']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Unable to update course']);
        }
    }

    private function delete() {
        if ($this->course->delete()) {
            echo json_encode(['message' => 'Course deleted']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Unable to delete course']);
        }
    }
}