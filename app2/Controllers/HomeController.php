<?php
namespace App\Controllers;

use App\Core\View;

class HomeController {
    public function index() {
        $data = [
            'title' => 'Calistenia Portugal - Portal Oficial',
            'featured_events' => $this->getFeaturedEvents()
        ];
        
        View::render('home', $data);
    }

    private function getFeaturedEvents() {
        // Exemplo de dados - substituir por consulta real ao banco
        return [
            [
                'title' => 'Torneio Nacional de Força',
                'date' => '2024-06-15',
                'location' => 'Lisboa'
            ],
            [
                'title' => 'Workshop de Progressões Avançadas',
                'date' => '2024-07-01',
                'location' => 'Porto'
            ]
        ];
    }
}