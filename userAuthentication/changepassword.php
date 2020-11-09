<?php
require_once('../database/common.php');

// WRITE YOUR CODES HERE
    $username = '';
    if (isset($_SESSION["pwd_change_fail"])){
        $username = $_SESSION["pwd_change_fail"];
        unset ($_SESSION["pwd_change_fail"]);
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <title>Change Password</title>
    </head>

    <style>

        html, body {
            height: 100%; 
        }

        body {
            background-image: url("");  /*insert background image url */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .changepassword-container {
            width: 400px;
            margin: 70px auto;
            font-size: 15px;
        }
        .changepassword-container form {
            margin-bottom: 25px;
            background: whitesmoke; 
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }
        .login-form h2 {
            margin: 25px;
            
        }
        .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
        }
        .btn {        
            font-size: 15px;
            font-weight: bold;
        }

        
        </style>

<body>
    
    <h1>Change Password </h1>

    <div class = "changepassword-container">

            <form action = "process_changepassword.php" method="POST">
            <!-- Change password heading -->
                <h2>
                    Change password!
                </h2>

                <div class = "form-group">

                    <input type="text" name="user_email" placeholder = "Email Address" class="form-control" />
                    
                </div>

                <div class = "form-group">

                    <input type="password" name="originalPassword" placeholder = "Old Password" class="form-control" />
                    
                </div>

                <div class = "form-group">

                    <input type="password" name="newPassword" placeholder = "New Password" class="form-control" />
                    
                </div>

                <div class = "form-group">

                    <input type="password" name="newconfirmPassword" placeholder = "Confirm New Password" class="form-control" />
                    
                </div>

                <div class="form-group">

                    <button type="submit" class="btn btn-danger btn-block" name="btn_register">Submit</button></a>

                </div>   

            </form>
            <?php printErrors(); ?>
        </div>
    
</body>
</html>