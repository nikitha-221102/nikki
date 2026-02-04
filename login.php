<?php
include "connect.php";
if(isset($_POST['login'])){
    $email =  $_POST['email'];
    $password = $_POST['password'];
    //clean input:
    $email=trim($email);
    $password=trim($password);
    //case handling:
    $email=strtolower($email);

    $query = "select * from users where email='$email'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("database error");
    }
    if(mysqli_num_rows($result)==0){
        print"invalud email";
    }
    else{
        if (mysqli_num_rows($result)>0){
            //string compare:
            $row=mysqli_fetch_assoc($result);
            if(strcmp($row['password'],$password)==0){
                echo"login successfull";
                header("Location: index-1.html");
                exit();
            }
            else{
                print "password does not match";
            }   
        }
        else{
            echo "Invalid email or password";
        }
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

