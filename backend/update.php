<?php
require '../config/db.php';

$email = $_POST['email'] ?? '';
$name = $_POST['name'] ?? '';

if (!$email || !$name) die("All fields required");

$db->users->updateOne(
    ['email' => $email],
    ['$set' => ['name' => $name]]
);

echo "Updated successfully";
?>