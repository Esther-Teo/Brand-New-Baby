<?php
require_once("../database/common.php");

    // email and name cannot be blank nor empty string

    $errors = [];

    $user= null;
    
    // Get the data from form processing and check data
    $useremail = $_POST["user_email"]; 
    if ( strlen($useremail) == 0 ) {
        $errors[] = "Email cannot be empty nor blank.";
    }
    else
    {
        $dao = new UserDAO();
        $user = $dao->get( $useremail );
        $_SESSION["pwd_change_fail"] = $useremail; 

        if (!$user){
            $errors[] = "Email is invalid.";
        }
    }

    $original_password = $_POST["originalPassword"]; 
    if ( strlen($original_password) == 0 ) {
        $errors[] = "Original Password cannot be empty nor blank.";
    }

    $new_pwd = $_POST["newPassword"]; 
    if ( strlen($new_pwd ) == 0 ) {
        $errors[] = "New Password cannot be empty nor blank.";
    }

    $confirm_new_pwd = $_POST["newconfirmPassword"]; 
    if ( strlen($confirm_new_pwd) == 0 ) {
        $errors[] = "Confirmed New Password cannot be empty nor blank.";
    }

    if ($new_pwd != $confirm_new_pwd){
        $errors[] = "The NEW passwords are different.";
    }

    // Check if password is valid
    if ( (count($errors)==0) && ($user)) {
        $hashed_password = $user->getPasswordHash();
        // check that the password is valid
        $status = password_verify( $original_password, $hashed_password); 

        if (!$status){
            $errors[] = "Existing password invalid";
        }
    }

    // Errors to show in change_password.php
    if ( count($errors) > 0 ) {
        // Put the error message in session variable 'errors'
        $_SESSION['errors'] = $errors;
        
        // return to register.php
        // keep the username, require the user to rekey the password
        $_SESSION["pwd_change_username"] = $useremail;
        header("Location: change_password.php"); 
        return;
    }

    // update the hased password in the database
    $hashed = password_hash($new_pwd, PASSWORD_DEFAULT);
    $user->setPasswordHash($hashed);
    $status = $dao->update($user);


if ( $status ) {
    // success; redirect
    $_SESSION["login_page"] = $useremail;
    header("Location: login.php");
    exit();
}
else {
    $_SESSION["pwd_change_fail"]= $useremail;
    $errors[] = "Error in update user user.";
    header("Location: change_password.php");
    return;
    
}