<?php
require __DIR__ . '/../vendor/autoload.php';

try {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $db = $client->userDB;
} catch (Exception $e) {
    die("DB connection failed: " . $e->getMessage());
}
?>