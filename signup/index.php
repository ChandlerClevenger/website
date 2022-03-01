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
    <div>
        <h1 id="signup">signup</h1>
        <form action="signup.php" method="POST" id="form">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" class="username" autofocus required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="password" required>

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" name="confirm-password" id="confirm-password" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="dob">DOB:</label>
            <input type="date" name="dob" id="dob" required>

            <label for="favorite-color">Favorite color:</label>
            <input type="color" name="favorite-color" id="favorite-color" required>

            <label for="bio">Enter a BIO:</label>
            <input type="text-area" name="bio" id="bio" required>

            <label for="gender">Gender:</label>
            <div>
                <label for="male">male</label>
                <input type="radio" name="gender" id="male" value="male">
            </div>
            <div>
                <label for="female">female</label>
                <input type="radio" name="gender" id="female" value="female">
            </div>
            <div>
                <label for="other">other</label>
                <input type="radio" name="gender" id="other" value="other" checked>
            </div>
            
            <input type="submit" value="signup" id="submit">
        </form>
    </div>
    <div id="authentication">
        <h2>Password criteria</h2>
        <ul class="password-criteria">
            <li>Must be at least 12 characters long!</li>
            <li>Must have at least 2 numbers!</li>
            <li>Must have capital</li>
            <li>Must have at least 2 special characters!</li>
            <li>includes !@#$%^&*()_+</li>
        </ul>
        <div class="error" id="error">
        <?php 
            if(isset($_SESSION['error'])) {
                echo implode("<br>", $_SESSION['error']);
                unset($_SESSION['error']);
            }
        ?>
        </div>
    </div>
    <script src="./script.js"></script>
</body>
</html>