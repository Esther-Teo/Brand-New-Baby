<?php

require_once "common.php";

$errors = [];


// Get the data from form processing
$username = $_POST["user_email"]; 
if ( strlen($username) == 0 ) {
    $errors[] = "Name cannot be empty nor blank.";
}

$password = $_POST["password"]; 
if ( strlen($password) == 0 ) {
    $errors[] = "Password cannot be empty nor blank.";
}

$confirm_password = $_POST["confirmPassword"];


if ($password != $confirm_password){
    $errors[] = "The passwords are different.";
}



// Check if username is already taken
if ( strlen($username) != 0 ){
    $dao = new UserDAO();
    $user = $dao->get($username);

    if ($user){
        $errors[] = "Email is already taken.";
    }
}

// If one or more fields have validation error
if ( count($errors) > 0 ) {
    // Put the error message in session variable 'errors'
    $_SESSION["errors"] = $errors;
        
    // return to register.php
    // keep the username, require the user to rekey the password
    $_SESSION["register_fail"] = $username;
    header("Location: register.php"); 
    return;
}

$rname = $_POST["user_name"];
$mobilenumber = $_POST["user_number"];
$addrss = $_POST["user_address"];
$acctype = $_POST["acctype"];


$hashed = password_hash($password, PASSWORD_DEFAULT);
$new_user = new User($username, $hashed, $rname, $mobilenumber, $addrss, $acctype);
$dao = new UserDAO();
    
$status = $dao->create($new_user);
    
    
if ( $status ) {
    // success; redirect page
    $_SESSION["login_page"] = $username;
    header("Location: login.php");
    exit();
}
else
{
    $_SESSION["register_fail"]= $username;
    $errors[] = "Error in registering user user.";
    header("Location: register.php");
    return;
}
    
    
?>
