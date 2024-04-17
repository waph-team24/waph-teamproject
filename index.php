<?php
    session_set_cookie_params(15*60,"/","waph-team24.minifacebook.com",TRUE,TRUE);
	session_start();
	require "database.php";
	if(isset($_POST["username"]) and isset($_POST["password"])){    
		if (checklogin_mysql($_POST["username"],$_POST["password"])) {
			$_SESSION['authenticated'] = TRUE;
			$_SESSION['username'] = $_POST["username"];	
			$_SESSION["browser"] = $_SERVER["HTTP_USER_AGENT"];	
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
		<h2> Welcome <?php echo htmlentities( $_SESSION['username']); ?> !</h2>
        <a href ="changepasswordform.php">Change password</a> | <a href ="profile.php">Edit profile</a> | <a href= "logout.php">Logout</a>