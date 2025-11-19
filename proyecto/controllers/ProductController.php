<?php
// /controllers/ProductController.php

class ProductController {
    private $model;

    public function __construct() {
        $this->model = new ProductModel(); 
    }

    public function index() {
        $products = $this->model->getAllProducts();
        include __DIR__ . '/../views/products/index.php';
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $data = [
                'name' => $_POST['name'],
                'price' => $_POST['price']
            ];
            
            // Validación básica de datos
            if (!empty($id) && !empty($data['name']) && is_numeric($data['price'])) {
                $this->model->updateProduct($id, $data);
            }

            // --- INICIO DE LA CORRECCIÓN ---
            
            // 1. Determinar la URL base del proyecto (ej: /proyecto/public)
            $scriptName = $_SERVER['SCRIPT_NAME'];
            $basePath = str_replace(basename($scriptName), '', $scriptName);
            
            // 2. Construir la URL completa de redirección (ej: /proyecto/public/products)
            $redirectUrl = $basePath . 'products';
            
            header("Location: " . $redirectUrl);
            // --- FIN DE LA CORRECCIÓN ---
            
            exit;
        }
    }
}