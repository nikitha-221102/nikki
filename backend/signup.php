<?php
require '../config/db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!$name || !$email || !$password) {
        $message = "All fields required";
    } elseif (strlen($password) < 6) {
        $message = "Password must be 6+ characters";
    } else {

        $existing = $db->users->findOne(['email' => $email]);

        if ($existing) {
            $message = "Email already exists";
        } else {
            $db->users->insertOne([
                'name' => $name,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);

            $message = "Signup successful!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3>Signup</h3>

        <?php if($message) echo "<div class='alert alert-info'>$message</div>"; ?>

        <form method="POST">
            <input class="form-control mb-2" name="name" placeholder="Name">
            <input class="form-control mb-2" name="email" placeholder="Email">
            <input class="form-control mb-2" type="password" name="password" placeholder="Password">

            <button class="btn btn-primary">Signup</button>
            <a href="login.php" class="btn btn-link">Login</a>
        </form>
    </div>
</div>

</body>
</html>