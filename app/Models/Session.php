<?php
namespace App\Models;

class Session {
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function unset() {
        session_unset();
    }

    public static function destroy() {
        session_start();
        session_unset();
        session_destroy();
    }
}
