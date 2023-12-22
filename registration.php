<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo
        "<script> alert('Username or Email Has Already Taken'); </script>";
      }
      else{
        if($password == $confirmpassword){
            $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Registration Successful'); </script>";
        }
        else{
            echo
            "<script> alert('Password Does Not Match'); </script>";
        }
      }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style_registration.css">
    <title>Registration</title>
</head>
<body>
    <form action="" method="post" autocomplete="off"><
    <div class="box">
        <div class="container">
            <div class="top-header">

                <header>Registration</header>
            </div>

            <div class="input-field">
                <input type="text" name="name" class="input" placeholder="Name" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-field">
                <input type="text" name="username" class="input" placeholder="Username" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-field">
                <input type="text" name="email" class="input" placeholder="Email" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-field">
                <input type="password" name="password" class="input" placeholder="Password" required>
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-field">
                <input type="password" name="confirmpassword" class="input" placeholder="Confirm Password" required>
                <i class="bx bx-lock-alt"></i>
            </div> 
            <div class="input-field">
                <input type="submit" name="submit" class="submit" value="Register">
            </div>

            <div class="bottom">
                <div class="left">
                    <label>Already have an account? <a href="login.php">Login here..</a></label>
                </div>
            </div>
        </div>

    </div>
    </form>
</body>
</html>