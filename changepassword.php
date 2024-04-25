<?php
  require "session_auth.php";
  require "database.php";
  $token = $_POST['nocsrftoken'];
  if (!isset($token) or $token!=$_SESSION['nocsrftoken']) {
     echo "CSRF Attack is detected!";
     die();
  }
  $username = $_SESSION['username'];
  $oldpassword = $_REQUEST['oldpassword'];
  $newpassword = $_REQUEST['newpassword'];
  
  if (isset($username) and isset($oldpassword) and isset($newpassword) ){
   //  echo "Debug> Changepassword.php got username=$username;newpassword=$newpassword";
    echo "password has been changed!<a href='https://waph-team24.minifacebook.com/logout.php'>Logout</a>";
       if(changepassword($username,$oldpassword,$newpassword)){
            echo "password has been changed!<a href='https://waph-team24.minifacebook.com/logout.php'>Logout</a>";
        }else{
            echo " Change password Failed!<a href='https://waph-team24.minifacebook.com/logout.php'>Logout</a>";
        }
  }else{
     echo " No username/password provided!";
  }   
    
?>
        
