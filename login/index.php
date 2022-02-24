<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../favicon.ico?" type="image/x-icon"/>
    <script src="script.js"></script>
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" class="username" autofocus>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="password">
        <input type="submit" value="login">
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