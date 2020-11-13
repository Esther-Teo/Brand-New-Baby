<?php

session_start();

    // WRITE YOUR CODES HERE

    if (isset ($_SESSION["useremail"])){
        echo "<div class=container4><h1> You have successfully logged out </h1></div>";
        unset($_SESSION["useremail"]);
        unset($_SESSION["errors"]);
        $_SESSION = [];

        echo "<div class=container4><a href=login.php> Home </a></div>";
    }
    else
    {
        header("Location: login.php");
        $_SESSION = [];
        return;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>

<style>
body {
            background-image: url("./login_image.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        div.container4 {
            height: 10em;
            position: relative 
        }
        div.container4 h1 {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%) 
        }

        div.container4 a {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%)
        }
</style>
<body>
    
</body>
</html>
