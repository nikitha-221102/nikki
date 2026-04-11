<?php
session_start();
require '../config/db.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

/* DELETE */
if (isset($_GET['delete'])) {
    $db->users->deleteOne(['email' => $_GET['delete']]);
    header("Location: list_users.php");
    exit();
}

/* UPDATE */
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_email'])) {
    $db->users->updateOne(
        ['email' => $_POST['update_email']],
        ['$set' => ['name' => $_POST['update_name']]]
    );
    header("Location: list_users.php");
    exit();
}

$users = $db->users->find();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

<h3>Welcome <?= $_SESSION['user'] ?></h3>

<a href="logout.php" class="btn btn-danger mb-3">Logout</a>

<table class="table table-bordered bg-white">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

    <?php foreach($users as $u): ?>
    <tr>
        <td><?= $u['name'] ?></td>
        <td><?= $u['email'] ?></td>
        <td>

            <!-- DELETE -->
            <a href="?delete=<?= $u['email'] ?>" class="btn btn-sm btn-danger">Delete</a>

            <!-- UPDATE FORM -->
            <form method="POST" style="display:inline;">
                <input type="hidden" name="update_email" value="<?= $u['email'] ?>">
                <input name="update_name" placeholder="New Name" required>
                <button class="btn btn-sm btn-primary">Update</button>
            </form>

        </td>
    </tr>
    <?php endforeach; ?>

</table>

</div>

</body>
</html>