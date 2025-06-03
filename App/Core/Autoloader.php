<?php
namespace App\Core;

class Autoloader {
    public static function register() {
        spl_autoload_register(function ($class) {
            $base_dir = __DIR__ . '/../../';
            $file = $base_dir . str_replace('\\', '/', $class) . '.php';
            
            if (file_exists($file)) {
                require $file;
                return true;
            }
            
            error_log("Autoloader: Class $class not found in $file");
            return false;
        });
    }
}