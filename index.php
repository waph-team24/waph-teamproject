<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    session_set_cookie_params(15*60,"/","waph-team09.minifacebook.com",TRUE,TRUE);
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
            echo "<script>alert('Invalid username/password');window.location='form.php';</script>";
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
<div class="container mt-5">
    <h2> Welcome <?php echo htmlentities( $_SESSION['username']); ?> !</h2>
    <a class="btn btn-primary" href ="changepasswordform.php">Change password</a>
    <a class="btn btn-primary" href ="edituserprofileform.php">Edit profile</a>
    <a class="btn btn-primary" href="viewposts.php">View Posts</a>
    <a class="btn btn-primary" href= "logout.php">Logout</a>
</div>
</body>
</html>
