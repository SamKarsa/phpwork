<?php
// /models/ProductModel.php

class ProductModel {
    private $db;

    public function __construct() {
        // Database se carga gracias al Autoloader
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function getAllProducts() {
        $stmt = $this->db->prepare("SELECT * FROM products");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updateProduct($id, $data) {
        $stmt = $this->db->prepare(
            "UPDATE products SET name = ?, price = ? WHERE id = ?"
        );
        // La ejecución es segura (PDO Prepared Statement)
        return $stmt->execute([$data['name'], $data['price'], $id]); 
    }
}