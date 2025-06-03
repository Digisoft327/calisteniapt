<?php
class EventController {
    public function index() {
        $pdo = Database::getInstance();
        $stmt = $pdo->query("SELECT * FROM events WHERE status = 'approved' ORDER BY date DESC");
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return View::render('events/index', ['events' => $events]);
    }

    public function create() {
        if ($_SESSION['user']['role'] !== 'club') {
            redirect('/login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => sanitize($_POST['title']),
                'description' => sanitize($_POST['description']),
                'location' => sanitize($_POST['location']),
                'date' => $_POST['date']
            ];

            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("INSERT INTO events 
                (title, description, location, date, organizer_type, organizer_id, status)
                VALUES (?, ?, ?, ?, 'club', ?, 'pending')");
            
            $stmt->execute([
                $data['title'],
                $data['description'],
                $data['location'],
                $data['date'],
                $_SESSION['user']['id']
            ]);

            Session::flash('success', 'Evento submetido para aprovação!');
            redirect('/eventos');
        }

        return View::render('events/create');
    }
}
?>