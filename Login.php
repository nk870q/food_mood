<?php
include ("config.php"); //connect to database
session_start();

if(isset($_POST['signin'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    //$password = md5($password);
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $sql);
    if(empty($_POST['username'])|| empty(($_POST['password']))){
        echo '<script language="javascript">';
        echo 'alert("Please enter the details!")';
        echo '</script>';
    }
    elseif (mysqli_num_rows($result) == 0) {
        echo '<script language="javascript">';
        echo 'alert("We could not find you. Please try again!")';
        echo '</script>';
    } else {
        $_SESSION['username'] = $username;
        header("location: Home.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Food-Mood</title>

    <link href="login-assets/assets/css/main.css" rel="stylesheet" type="text/css" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
</head>

<body>
<header id="header">
    <h1 style="font-family: AppleGothic"><strong>Food-Mood</strong></h1>
</header>

<!-- Signup Form -->
<form method="post" action="Login.php">
    <input type="text" name="username"  placeholder="Username" style="width:300px; background-color: #eeeeee; color: black" /><br />
    <input type="password" name="password"  placeholder="Password" style="width:300px;background-color: #eeeeee; color: black"><br />
    <button name="signin">Sign In</button>
    <button style="margin-left: 10px" name="signup"><a href="Register.php"> Sign Up</a></button>
</form>

<!-- Scripts -->
<script src="login-assets/assets/js/main.js"></script>


</body>
</html>