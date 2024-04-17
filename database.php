<?php
    $mysqli= new mysqli('localhost','waph-team24','team@24','waph_team');
    if ($mysqli->connect_errno){
      printf("DATABASE COONECTION FAILED: %s\n", $mysqli->connect_error);
      return FALSE;
    } 

    function addnewuser($username, $password) {
      global $mysqli;
     $prepared_sql ="INSERT INTO users (username,password) VALUES (?,md5(?));";
     $stmt = $mysqli->prepare($prepared_sql);
     $stmt-> bind_param("ss",$username,$password);
     if($stmt->execute()) return TRUE; 
      return FALSE;
    }
    function checklogin($username, $password) {
    $account = array("admin","1234");
    if (($username== $account[0]) and ($password == $account[1])) 
      return TRUE;
    else 
      return FALSE;
    }
    function checklogin_mysql($username, $password) {
      global $mysqli;
      $prepared_sql = "SELECT * FROM users WHERE username= ? AND password=md5(?);";
      $stmt=$mysqli->prepare($prepared_sql);
      $stmt->bind_param("ss",$username,$password);
      $stmt->execute();
      //echo "DEBUG>sql = $sql"; //return TRUE;
      $result = $stmt->get_result();
      if($result->num_rows ==1)
        return TRUE;
      return False;
  }
  function changepassword($username, $password) {
     global $mysqli;
     $prepared_sql ="UPDATE  users SET password = md5(?) WHERE username =?;";
     $stmt = $mysqli->prepare($prepared_sql);
     $stmt-> bind_param("ss",$username,$password);
     if($stmt->execute()) return TRUE; 
      return FALSE;
    }
?>
        