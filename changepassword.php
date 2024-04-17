<?php
  require "session_auth.php";
  require "database.php";
  $token = $_POST['nocsrftoken'];
  if (!isset($token) or $token!=$_SESSION['nocsrftoken']) {
     echo "CSRF Attack is detected!";
     die();
  }
  $username = $_SESSION['username'];
  $password = $_REQUEST['password'];
  if (isset($username) and isset($password)) {
    echo "Debug> Changepassword.php got username=$username;newpassword=$password";
       if(changepassword($username,$password)){
            echo "password has been changed!";
        }else{
            echo " Change password Failed!";
        }
  }else{
     echo " No username/password provided!";
  }   
    
?>
        