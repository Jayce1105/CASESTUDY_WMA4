<?php
class Database
{
    private static ?PDO $instance = null;

    private string $host = 'sql311.infinityfree.com';
    private string $dbName = 'if0_43007035_sarapexpress';
    private string $username = 'if0_43007035';
    private string $password = 'sarapexpress26';

    private function __construct()
    {
    }

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $db = new self();
            try {
                self::$instance = new PDO(
                    "mysql:host={$db->host};dbname={$db->dbName};charset=utf8mb4",
                    $db->username,
                    $db->password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            } catch (PDOException $e) {
                die('Database connection failed: ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
