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
            echo json_encode(['message' => 'Paramêtro não encontrado']);
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
                echo json_encode(['message' => 'Metodo não suportado']);
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
            echo json_encode(['message' => 'Curso não encontrado']);
        }
    }

    private function create() {
        $data = json_decode(file_get_contents('php://input'), true);
        $this->course->title        = $data['title']        ?? null;
        $this->course->image        = $data['image']        ?? null;
        $this->course->description  = $data['description']  ?? null;
        $this->course->url          = $data['url']          ?? null;

        if (
            empty($this->course->title) ||
            empty($this->course->image) ||
            empty($this->course->description) ||
            empty($this->course->url)
        ) {
            http_response_code(400);
            echo json_encode(['message' => 'Todos os campos (title, image, description, url) são obrigatórios.']);
            return;
        }

        if ($this->course->create()) {
            http_response_code(201);
            echo json_encode(['message' => 'Curso registrado com sucesso', 'id' => $this->course->id]);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Não foi possível registrar o curso']);
        }
    }


    private function update() {
       $data = json_decode(file_get_contents('php://input'), true);
        $this->course->title        = $data['title']        ?? null;
        $this->course->image        = $data['image']        ?? null;
        $this->course->description  = $data['description']  ?? null;
        $this->course->url          = $data['url']          ?? null;

        if (
            empty($this->course->title) ||
            empty($this->course->image) ||
            empty($this->course->description) ||
            empty($this->course->url)
        ) {
            http_response_code(400);
            echo json_encode(['message' => 'Todos os campos (title, image, description, url) são obrigatórios.']);
            return;
        }

        if ($this->course->update()) {
            http_response_code(201);
            echo json_encode(['message' => 'Curso atualizado com sucesso', 'id' => $this->course->id]);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Não foi possível atuaalizar o curso']);
        }
    }

    private function delete() {
        if ($this->course->delete()) {
            echo json_encode(['message' => 'Curso deletado com sucesso']);
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Não foi possível atuaalizar o curso']);
        }
    }
}