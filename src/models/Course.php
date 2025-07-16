<?php
namespace Models;

use PDO;

class Course {
    private $conn;
    private $table = 'courses';

    public $id;
    public $title;
    public $image;
    public $description;
    public $created_at;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function readAll() {

    }

    public function readOne() {

    }

    public function create() {
        
    }

    public function update() {
        
    }

    public function delete() {

    }
}
