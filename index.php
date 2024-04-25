
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://img.freepik.com/premium-photo/facebook-logo-buutton-phone-screen-background-premium-photo_261703-194.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: transparent;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            margin-right: 20px; }
    </style>
</head>
<body>
<?php
    session_set_cookie_params(15*60,"/","waph-team24.minifacebook.com",TRUE,TRUE);
    session_start();
    require "database.php";
    if(isset($_POST["username"]) and isset($_POST["password"])){    
        if (checklogin_mysql($_POST["username"],$_POST["password"])) {
            $_SESSION['authenticated'] = TRUE;
            $_SESSION['username'] = $_POST["username"];    
            $_SESSION["browser"] = $_SERVER["HTTP_USER_AGENT"];
            $_SESSION["csrf"] = bin2hex(openssl_random_pseudo_bytes(16));
        }else{
            session_destroy();
            echo "<script>alert('Your Account is disabled');window.location='form.php';</script>";
            die();
        }
    }
    if(!isset($_SESSION['authenticated']) or $_SESSION['authenticated']!= TRUE){
        session_destroy();
        echo "<script>alert('You have not login.Please login first!')</script>";
        header("Refresh: 0; url=form.php");
        die();
    }   
    if ($_SESSION["browser"] != $_SERVER["HTTP_USER_AGENT"]){
        session_destroy();
        echo "<script>alert('Session hijacking attack is detected!');</script>";
        header("Refresh:0; url=form.php");
        die();
    }
?>
<div class="container">
    <h2> Welcome <?php echo htmlentities( $_SESSION['username']); ?> !</h2>
    <a class="btn btn-primary" href ="changepasswordform.php">Change password</a>
    <a class="btn btn-primary" href ="edituserprofileform.php">Edit profile</a>
    <a class="btn btn-primary" href="viewposts.php">View Posts</a>
    <a class="btn btn-primary" href= "logout.php">Logout</a>
</div>
</body>
</html>
```
