<?php
include "connect.php";
if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // clean input:
    $name=trim($name);
    $email=trim($email);
    $password=trim($password);
    // validate input length:
    if(strlen($name)<3){
        die("name must contain atleast 3 characters");
    }
    if(strlen($password)<4){
        die("password must contain minimum 4 characters");
    }
    //format name :
    $name=ucwords(strtolower($name));
    $email=strtolower($email);
    
    $query = "insert into users (name, email, password) values ('$name','$email','$password')";
    $result=mysqli_query($conn,$query);
    if($result){
        $success="registration successful. please login.";
    }
    else{
        $error="Registration failed";
    }
}
?>

<!Doctype html>
<html>
    <head>
        <title>Register</title>
    </head>
    <body>
        <h2>Swiggy User Registration</h2>
        <?php
        if(isset($success)){
            echo "<p style='color:green;'>$success</p>";
        }
        if(isset($error)){
            echo "<p style='color:red;'>$error</p>";
        }
        ?>
        <form method="post">
            <input type="text" name="name" placeholder="name" required><br><br>
            <input type="email" name="email" placeholder="email" required><br><br>
            <input type="passwrord" name="password" placeholder="password" required><br><br>
            <button type="submit" name="register">Register</button>
        </form>
        <br>
        <a href="login.php">Already have an account? Login</a>
    </body>
</html>
