<?php 
session_start();
if(!isset($_SESSION['user'])) header("Location: ../login");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    Hello, <?php echo $_SESSION['user']; ?>.
    <?php
        if($_SESSION['user'] == "admin"){
            include("adminPowers.php");
        }
    ?>
</body>
</html>