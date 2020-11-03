<!-- 
<?php 
    #reqr the file to connect to db
    #require_once a file for opening a session
    #Set an empty string to catch errors
    /*$error = '';
    if(isset($_POST['login'])){
        $user_email = trim($_POST["user_email"]);
        $user_password = trim($_POST["user_password"]);
        if (empty($user_email)){
            #$error += ;
        }
    }*/
    #Note that the php is not completed
    require_once 'common.php';
    $username='';
    if (isset ($_SESSION["login_page"])){
        $username = $_SESSION["login_page"];
        unset ($_SESSION["login_page"]);
}
?>
?>
-->

<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <title>Brand New Baby (Login)</title>
    </head>

    <style>

        html, body {
            height: 100%; 
        }

        body {
            background-image: url("./login_image.jpg");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .login-container {
            width: 400px;
            margin: 70px auto;
            font-size: 15px;
        }
        .login-container form {
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

        <div class = "login-container">

            <form action = "process_login.php" method="POST">
            <!-- Login heading -->
                <h2>
                    Welcome! Please Login 
                </h2>

                <div class = "form-group">

                    <input type="text" name="username" placeholder = "Email Address" class="form-control" required="required"/>
    
                </div>

                <div class = "form-group">

                    <input type="password" name="password" placeholder = "Password" class="form-control" required="required"/>
                    
                </div>

                <div class = "form-group">

                    <button type="submit" class="btn btn-danger btn-block" name="btn-login">Log in</button>

                </div>

                <div class="clearfix">
                    <a href="register.php" class="float-left">Create An Account</a>
                    <a href="#" class="float-right">Forgot Password?</a>
                </div>   

            </form>

        </div>

         
    </body>
</html>

   
