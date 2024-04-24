<?php
$mysqli= new mysqli('localhost','waph_team24','Pa$$w0rd','waph_team');
if ($mysqli->connect_errno){
  printf("DATABASE COONECTION FAILED: %s\n", $mysqli->connect_error);
  return FALSE;
}

function checkSuperuserLogin($username, $password) {
    global $mysqli;
    $prepared_sql = "SELECT * FROM superuser WHERE username= ? AND password=md5(?);";
    $stmt = $mysqli->prepare($prepared_sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    }
    return false;
  }
  function disableUser($username) {
    global $mysqli;
    $query = "UPDATE users SET status = 'disabled' WHERE username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $username);
    if ($stmt->execute()) {
        return true;
    }
    return false;
}
function enableUser($username) {
  global $mysqli;
  $query = "UPDATE users SET status = 'active' WHERE username = ?";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("s", $username);
  if ($stmt->execute()) {
      return true;
  }
  return false;
}