<?php
    $mysqli= new mysqli('localhost','waph_team24','Pa$$w0rd','waph_team');
    if ($mysqli->connect_errno){
      printf("DATABASE COONECTION FAILED: %s\n", $mysqli->connect_error);
      return FALSE;
    } 

    function addnewuser($username, $password,$otheremail,$fullname,$phone) {
      global $mysqli;
     $prepared_sql ="INSERT INTO users (username,password,otheremail,fullname,phone) VALUES (?,md5(?),?,?,?);";
     $stmt = $mysqli->prepare($prepared_sql);
     $stmt-> bind_param("sssss",$username,$password,$otheremail,$fullname,$phone);
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
      $prepared_sql = "SELECT * FROM users WHERE username= ? AND password=md5(?) AND status = 'active';";
      $stmt=$mysqli->prepare($prepared_sql);
      $stmt->bind_param("ss",$username,$password);
      $stmt->execute();
      //echo "DEBUG>sql = $sql"; //return TRUE;
      $result = $stmt->get_result();
      if($result->num_rows ==1)
        return TRUE;
      return False;
  }
  function changepassword($username, $oldpassword,$newpassword) {
     global $mysqli;
     $prepared_sql ="UPDATE  users SET password = md5(?) WHERE username =? and password=md(?);";
     $stmt = $mysqli->prepare($prepared_sql);
     $stmt-> bind_param("sss",$username,$newpassword,$oldpassword);
     if($stmt->execute()) return TRUE; 
      return FALSE;
    }
    
    function editprofile($username, $fullname, $otheremail, $phone) {

        global $mysqli;
        $prepared_sql = "UPDATE users SET fullname=?, otheremail=?, phone=? WHERE username=?;";
        $stmt = $mysqli->prepare($prepared_sql);
        $stmt->bind_param("ssss", $fullname, $otheremail, $phone, $username);
        if ($stmt->execute()) return true;
        return false;
        }
    function getAllPosts() {
        global $mysqli;
        $query = "SELECT * FROM posts ORDER BY posttime DESC";
        $result = $mysqli->query($query);
        $posts = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $posts[] = $row;
            }
        }
        return $posts;
    }
    function addNewPost($title, $content, $owner) {
      global $mysqli;
      $query = "INSERT INTO posts (title, content, owner) VALUES (?, ?, ?)";
      $stmt = $mysqli->prepare($query);
      $stmt->bind_param("sss", $title, $content, $owner);
      if ($stmt->execute()) {
          return true;
      }
      return false;
  }
  function addNewComment($postID, $comment, $commenter) {
    global $mysqli;
    $query = "INSERT INTO comments (postID, comment, commenter) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sss", $postID, $comment, $commenter);
    if ($stmt->execute()) {
        return true;
    }
    return false;
}
function getPostById($postID) {
  global $mysqli;
  $query = "SELECT * FROM posts WHERE postID = ?";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("s", $postID);
  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows == 1) {
      return $result->fetch_assoc();
  }
  return false;
}
function editPost($postID, $title, $content) {
  global $mysqli;
  $query = "UPDATE posts SET title = ?, content = ? WHERE postID = ?";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("sss", $title, $content, $postID);
  if ($stmt->execute()) {
      return true;
  }
  return false;
}

function deletePost($postID) {
  global $mysqli;
  $query = "DELETE FROM posts WHERE postID = ?";
  $stmt = $mysqli->prepare($query);
  $stmt->bind_param("s", $postID);
  if ($stmt->execute()) {
      return true;
  }
  return false;
}


?>


        
