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
    public $url;
    public $created_at;

    public function __construct(PDO $db) {
        $this->conn = $db;
    }

    public function readAll() {

    }

    public function readOne() {

    }

    public function create() {
        $stmt = $this->conn->prepare("
            INSERT INTO {$this->table} (title, image, description, url)
            VALUES (:title, :image, :description, :url)
        ");
        $stmt->bindParam(':title',       $this->title);
        $stmt->bindParam(':image',       $this->image);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':url',         $this->url);

        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }
        return false;
    }

    public function update() {

    }

    public function delete() {

    }
}
