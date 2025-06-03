<?php
namespace App\Core;

class Helpers {
    public static function sanitize($data) {
        if (is_array($data)) {
            return array_map([self::class, 'sanitize'], $data);
        }
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    public static function redirect($url, $statusCode = 303) {
        header('Location: ' . $url, true, $statusCode);
        exit();
    }

    public static function isAuthenticated() {
        return isset($_SESSION['user']);
    }
}