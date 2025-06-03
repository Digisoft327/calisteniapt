<?php
// Carregue o bootstrap
require_once __DIR__ . '/../App/Core/bootstrap.php';

use App\Core\View;
use App\Controllers\HomeController;

try {
    try {
        $request = $_GET['url'] ?? '/';

        switch ($request) {
            case '/':
                $controller = new App\Controllers\HomeController();
                $controller->index();
                break;
                
            case 'eventos':
                $controller = new App\Controllers\EventController();
                $controller->index();
                break;
                
            case 'eventos/novo':
                $controller = new App\Controllers\EventController();
                $controller->create();
                break;
                
            case (preg_match('/^evento\/(\d+)$/', $request, $matches) ? true : false):
                $controller = new App\Controllers\EventController();
                $controller->show($matches[1]);
                break;
                
            case 'eventos':
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $controller = new App\Controllers\EventController();
                    $controller->store();
                }
                break;
                
            // Adicione outras rotas aqui
                
            default:
                http_response_code(404);
                View::render('errors/404');
        }
    } catch (\Throwable $e) {
        error_log("Fatal error: " . $e->getMessage());
        http_response_code(500);
        View::render('errors/500');
    }
} catch (\Throwable $e) {
    error_log("Fatal error: " . $e->getMessage());
    http_response_code(500);
    echo "<h1>Erro crítico</h1>";
    echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
}