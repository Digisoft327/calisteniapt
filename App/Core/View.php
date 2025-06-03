<?php
namespace App\Core;

class View {
    public static function render($view, $data = []) {
        extract($data);
        $viewPath = __DIR__ . '/../../App/Views/' . $view . '.php';
        
        if (!file_exists($viewPath)) {
            throw new \Exception("View not found: " . $viewPath);
        }
        
        require $viewPath;
    }
}