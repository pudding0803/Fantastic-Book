<?php
namespace App\Models;

use PDO;
use PDOException;

class Database
{
    private static PDO $dbh;

    public static function getConnect() {
        if (isset(self::$dbh)) {
            return self::$dbh;
        }
        try {
            self::$dbh = new PDO('mysql: host=localhost; dbname=test', 'pudding', 'Pudding0803%');
            self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$dbh;
        } catch(PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            return null;
        }
    }
}
