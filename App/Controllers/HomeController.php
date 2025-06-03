<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class HomeController {
    public function index() {
        $pdo = Database::getInstance();
        
        // Obter eventos em destaque
        $stmt = $pdo->query("SELECT * FROM events WHERE status = 'approved' ORDER BY date DESC LIMIT 3");
        $featuredEvents = $stmt->fetchAll();
        
        // Obter próximos torneios
        $stmt = $pdo->query("SELECT * FROM tournaments WHERE status = 'active' ORDER BY start_date ASC LIMIT 3");
        $upcomingTournaments = $stmt->fetchAll();
        
        // Obter artigos recentes
        $stmt = $pdo->query("SELECT * FROM articles ORDER BY created_at DESC LIMIT 3");
        $recentArticles = $stmt->fetchAll();
        
        $data = [
            'title' => 'Calistenia Portugal - Portal Oficial',
            'featuredEvents' => $featuredEvents,
            'upcomingTournaments' => $upcomingTournaments,
            'recentArticles' => $recentArticles
        ];
        
        View::render('home', $data);
    }
}