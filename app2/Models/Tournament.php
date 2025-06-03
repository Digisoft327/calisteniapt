<?php
class Tournament {
    public static function createChallenge($tournamentId, $data) {
        $pdo = Database::getInstance();
        
        $stmt = $pdo->prepare("INSERT INTO challenges 
            (tournament_id, name, description, gender, difficulty_level, start_date, end_date)
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        return $stmt->execute([
            $tournamentId,
            $data['name'],
            $data['description'],
            $data['gender'],
            $data['difficulty_level'],
            $data['start_date'],
            $data['end_date']
        ]);
    }

    public static function getActiveTournaments() {
        $pdo = Database::getInstance();
        $stmt = $pdo->query("SELECT * FROM tournaments WHERE status = 'active'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>