<?php

require_once('config/database.php');

$database = new Database();
$db = $database->getConnection();

$migrationFiles = scandir(__DIR__ . '/migrations');
foreach ($migrationFiles as $file) {
    if ($file !== '.' && $file !== '..') {
        $sql = file_get_contents(__DIR__ . '/migrations/' . $file);
        
        try {
            $stmt = $db->exec($sql);
            echo "Migration $file executed successfully.\n";
        } catch (PDOException $e) {
            echo "Migration $file failed: " . $e->getMessage() . "\n";
        }
    }
}