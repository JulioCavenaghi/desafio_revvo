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
        $stmt = $this->conn->query("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
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
        $stmt = $this->conn->prepare("
            UPDATE {$this->table}
            SET title = :title,
                image = :image,
                description = :description
            WHERE id = :id
        ");
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete() {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
