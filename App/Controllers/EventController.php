<?php
namespace App\Controllers;

use App\Core\View;
use App\Core\Database;

class EventController {
    public function index() {
        $pdo = Database::getInstance();
        $stmt = $pdo->query("SELECT * FROM events WHERE status = 'approved' ORDER BY date DESC");
        $events = $stmt->fetchAll();
        
        View::render('events/index', [
            'title' => 'Eventos de Calistenia',
            'events' => $events
        ]);
    }

    public function show($id) {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ? AND status = 'approved'");
        $stmt->execute([$id]);
        $event = $stmt->fetch();
        
        if (!$event) {
            View::render('errors/404');
            return;
        }
        
        // Obter eventos relacionados
        $stmt = $pdo->prepare("SELECT * FROM events 
                              WHERE location = ? AND id != ? AND status = 'approved'
                              ORDER BY date DESC LIMIT 3");
        $stmt->execute([$event['location'], $id]);
        $relatedEvents = $stmt->fetchAll();
        
        View::render('events/show', [
            'title' => $event['title'],
            'event' => $event,
            'relatedEvents' => $relatedEvents
        ]);
    }

    public function create() {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        
        View::render('events/create', [
            'title' => 'Submeter Novo Evento'
        ]);
    }

    public function store() {
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }
        
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'location' => $_POST['location'],
            'date' => $_POST['date'],
            'organizer_type' => $_SESSION['user']['role'],
            'organizer_id' => $_SESSION['user']['id'],
            'status' => 'pending'
        ];
        
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("INSERT INTO events 
                              (title, description, location, date, organizer_type, organizer_id, status)
                              VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt->execute([
            $data['title'],
            $data['description'],
            $data['location'],
            $data['date'],
            $data['organizer_type'],
            $data['organizer_id'],
            $data['status']
        ])) {
            $_SESSION['success'] = 'Evento submetido com sucesso! Aguarde aprovação.';
            header('Location: /eventos');
        } else {
            $_SESSION['error'] = 'Erro ao submeter evento. Tente novamente.';
            header('Location: /eventos/novo');
        }
    }
}