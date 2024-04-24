
<?php
   require "database.php";
  $username = $_POST["username"];
  $password = $_POST["password"];
  $otheremail = $_POST["otheremail"];
  $fullname = $_POST["fullname"];
  $phone = $_POST["phone"];
  
  if (isset($username) and isset($password)) {
    //echo "Debug> got username=$username;password=$password";
       if(addnewuser($username,$password,$otheremail,$fullname,$phone)){
            echo "<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='utf-8'>
  <title>Registration Success</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e6f5ff; /* Light blue background color */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      padding: 0;
    }
    .container {
      text-align: center;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .message {
      margin-bottom: 20px;
    }
    .button {
      background-color: #007bff;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    .button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class='container'>
    <h1>Registration Succeed!</h1>
    <button class='button' onclick='window.location.href=\"https://waph-team24.minifacebook.com/form.php\"'>Login</button>
  </div>
</body>
</html>";
        }else{
            echo " Registration Failed!";
        } 
  }else{
     echo " No username/password provided!";
  }   
  function s_ip($input)
  {
  $input=trim($input);
  $input=htmlspecialchars($input);
  return $input;
  }
?>

