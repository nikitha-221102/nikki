<?php
include "connect.php";
if(isset($_POST['login'])){
    $email =  $_POST['email'];
    $password = $_POST['password'];
    echo"email entered: ".$email."<br>";
    echo"password entered:v".$password."<br>";
    $query = "select * from users where email='$email' and password='$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)>0){
        echo"login successfull";
        header("Location: index-1.html");
    }
    else{
        echo "Invalid email or password";
    }
}
?> 

<!Doctype html>
<html>
    <head>
        <title>login</title>
    </head>
    <body>
        <h2>Swiggy user login</h2>
        <form method="post">
            <input type="email" name="email" placeholder="email" required><br><br>
            <input type="password" name="password" placeholder="password" required><br><br>
            <button type="submit" name="login">login</button>
        </form>
    </body>
</html>

