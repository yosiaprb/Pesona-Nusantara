<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("location: index.php");
}
if(isset($_POST["submit"])){
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row['password']){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("location: index.php");
        }
        else{
            echo
            "<script> alert('Wrong Password'); </script>";
        }
    }
    else{
        echo
    "<script> alert('User Not Registered'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style_login.css">
    <title>Login</title>
</head>

<body>
    <form action="" method="post" autocomplete="off">
    <div class="box">
        <div class="container">
            <div class="top-header">

                <header>Login</header>
            </div>

            <div class="input-field">
                <input type="text" name="usernameemail" class="input" placeholder="Username or Email" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-field">
                <input type="password" name="password" class="input" placeholder="Password" required>
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-field">
                <input type="submit" name="submit" class="submit" value="Login">
            </div>

            <div class="bottom">
                <div class="left">
                    <label>Didn't have an account? <a href="registration.php">Register here..</a></label>
                </div>
            </div>
        </div>
    </div>
    </form>
</body>

</html>