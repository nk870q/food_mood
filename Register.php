<?php
include ("config.php"); //connect to database
session_start();
if(isset($_POST["start"]))
{
    $name = mysqli_real_escape_string($db, $_POST['fullname']);
    $mail = mysqli_real_escape_string($db, $_POST['mail']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $cpassword = mysqli_real_escape_string($db, $_POST['conpassword']);
    $sql = "INSERT INTO user (name,username,email,password) VALUES ('$name','$username','$mail','$password')";
    if(empty($_POST["fullname"]))
    {
        echo '<script language="javascript">';
        echo 'alert("Name cannot be empty")';
        echo '</script>';
    }
    elseif(empty($_POST["mail"]))
    {
        echo '<script language="javascript">';
        echo 'alert("Email-ID cannot be empty")';
        echo '</script>';
    }
    elseif(empty($_POST["username"]))
    {
        echo '<script language="javascript">';
        echo 'alert("Username cannot be empty")';
        echo '</script>';
    }
    elseif(empty($_POST["password"]))
    {
        echo '<script language="javascript">';
        echo 'alert("Password cannot be empty")';
        echo '</script>';
    }
    elseif(empty($_POST["conpassword"]))
    {
        echo '<script language="javascript">';
        echo 'alert("Please confirm your password!")';
        echo '</script>';
    }
    elseif($_POST['password'] != $_POST['conpassword'])
    {
        echo '<script language="javascript">';
        echo 'alert("Passwords do not match!")';
        echo '</script>';
    }
    elseif (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) === false) {
        echo '<script language="javascript">';
        echo 'alert("Invalid Email-ID!")';
        echo '</script>';
    }
    else
    {
        mysqli_query($db,$sql);
        $_SESSION['name'] = $username;
        header("location: Details.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>

    <link href="login-assets/assets/css/main.css" rel="stylesheet" type="text/css" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
</head>

<body>
<header id="header">
    <h1 style="font-family: AppleGothic"><strong>Food-Mood</strong></h1>
</header>
<form method="post" action="Register.php">
    <input type="text" name="fullname" placeholder="Full Name" style="width:300px; background-color: #eeeeee; color: black" /><br/>
    <input type="email" name="mail" placeholder="Email-ID" style="width:300px; background-color: #eeeeee; color: black"/><br/>
    <input type="text" name="username" placeholder="Username" style="width:300px; background-color: #eeeeee; color: black" /><br/>
    <input type="password" name="password" placeholder="Password" style="width:300px; background-color: #eeeeee; color: black" /><br/>
    <input type="password" name="conpassword" placeholder="Confirm Password" style="width:300px; background-color: #eeeeee; color: black" /><br/>
    <button name="start" style="width: auto;">Let's Get Started</button>
</form>
<!--<footer id="footer">
    <ul class="icons">
        <h3 style="font-family: AppleGothic">Or Sign Up using</h3>
        <li><a href="#" class="icon fa-facebook-square"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon fa-google-plus-square"><span class="label">Google</span></a></li>
    </ul>
</footer>-->

<!-- Scripts -->
<script src="login-assets/assets/js/main.js"></script>


</body>
</html>