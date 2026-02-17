<?php

require_once __DIR__ . "/../../core/Database.php";

class News {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getLatest($limit = 4, $offset = 0) {
        $stmt = $this->pdo->prepare("SELECT * FROM news ORDER BY date ASC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(":limit", (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", (int)$offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByID($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM news WHERE id = :id");
        $stmt->execute(["id" => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCount() {
        $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM news");
        
        return (int)$stmt->fetch(PDO::FETCH_ASSOC)["total"];
    }
}