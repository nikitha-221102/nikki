<?php
require '../config/db.php';

$email = $_POST['email'] ?? $_GET['email'] ?? '';

if (!$email) die("Email required");

$db->users->deleteOne(['email' => $email]);

echo "Deleted successfully";
?>