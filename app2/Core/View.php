<?php
namespace App\Core;

class View {
    public static function render(string $view, array $data = []) {
        extract($data);
        
        ob_start();
        require VIEW_PATH . "/{$view}.php";
        $content = ob_get_clean();
        
        require VIEW_PATH . "/layouts/main.php";
    }

    public static function component(string $component, array $data = []) {
        self::render("components/{$component}", $data);
    }
}