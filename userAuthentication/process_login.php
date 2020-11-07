<?php
    require_once 'common.php';


    $errors = [];

    // Get the data login.php
    $useremail = $_POST["useremail"];
    $password = $_POST["password"];

    // Create the DAO object to facilitate connection to the database.
    $dao = new UserDAO();
    $user = $dao->get( $useremail );

    // Check if the useremail exists
    if ($user)
    {
        // If useremail exists
        // get the hashed password from the database
        // Match the hashed password with the one which user entered
        // if it does not match. -> error
        $hashed_password = $user->getPasswordHash();
        // check if the plain text password is valid
        $status = password_verify( $password, $hashed_password); 

        if ($status)
        { 
            $_SESSION["useremail"] = $useremail;
            header("Location: home.html");
            return;
        }
        else
        {
            // password not valid
            // return to login page and show error
            $errors [] = "Invalid password.";
            $_SESSION['errors'] = $errors;
            $_SESSION["login_page"] = $useremail;
            header("Location: login.php");
            return;

        }

    } else
    {
        $errors [] = "Username does not exist in the database.";
        $_SESSION['errors'] = $errors;
        $_SESSION["login_page"] = $useremail;
        header("Location: login.php");
        return;
            
    }

?>

