<?php
session_start();
require '../config/db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = $db->users->findOne(['email' => $email]);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['name'];
        header("Location: list_users.php");
        exit();
    } else {
        $message = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3>Login</h3>

        <?php if($message) echo "<div class='alert alert-danger'>$message</div>"; ?>

        <form method="POST">
            <input class="form-control mb-2" name="email" placeholder="Email">
            <input class="form-control mb-2" type="password" name="password" placeholder="Password">

            <button class="btn btn-success">Login</button>
            <a href="signup.php" class="btn btn-link">Signup</a>
        </form>
    </div>
</div>

</body>
</html>