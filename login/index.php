<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../favicon.ico?" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" defer>
    <title>Login</title>
</head>
<body>
    <div id="login-form">
        <h1 id="login-header">Login</h1>
        <form action="login.php" method="POST" id="form-details">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="username" autofocus>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="password">
            <input type="submit" value="login" id="login-button" class="button">
        </form>
        <div id="socials">
            <a href="https://www.facebook.com/BillGates" class="fa fa-facebook"></a>
            <a href="https://twitter.com/BillGates" class="fa fa-twitter"></a>
            <a href="https://www.instagram.com/thisisbillgates" class="fa fa-instagram"></a>
        </div>
    </div>
    <form action="login.php" method="POST">
        <label hidden for="username">Username:</label>
        <input hidden type="text" name="username" class="username" value="adminadmin12">
        <label hidden for="password">Password:</label>
        <input hidden type="password" name="password" class="password" value="!ThePassword12!">
        <input type="submit" value="login as admin" class="button">
    </form>
    <div class="error">
    <?php 
        if(isset($_SESSION['error'])) {
            echo $_SESSION['error']; 
            unset($_SESSION['error']);
        }
    ?>
    </div>
</body>
</html>