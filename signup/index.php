<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../favicon.ico?" type="image/x-icon"/>
    <title>Sign up</title>
</head>
<body>
    <h1>signup</h1>
    <form action="signup.php" method="POST" id="form">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" class="username" autofocus>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" class="password">
        <input type="submit" value="signup">
    </form>

    <ul class="password-criteria">
        <li>Must have a capital letter!</li>
        <li>Must have a special character!</li>
        <li>includes !@#$%^&*()</li>
        <li>Must be at least 10 characters long!</li>
    </ul>

    <div class="error" id="error"></div>
    <?php 
        if(isset($_SESSION['error'])) {
            echo "<div class='error' id='class'>";
            if(gettype($_SESSION['error']) === gettype(array())) {
                echo implode("<br>", $_SESSION['error']);
            } else {
                echo $_SESSION['error']; 
            }
            unset($_SESSION['error']);
            echo "</div>";
        }
    ?>
    <script src="./script.js"></script>
</body>
</html>