<?php

class Lead {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function store($data){
        $query = "INSERT INTO leads (name, email, created_at) VALUES (:name, :email, NOW())";
        try {
            $stmt = $this->conn->getConnection()->prepare($query);
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':email', $data['email']);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }


}