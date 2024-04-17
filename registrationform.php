<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>WAPH-Login page</title>
  <script type="text/javascript">
      function displayTime() {
        document.getElementById('digit-clock').innerHTML = "Current time:" + new Date();
      }
      setInterval(displayTime,500);
  </script>
</head>
<body>
  <h1>New User registration, WAPH</h1>
  <h2>TEAM-24</h2>
  <div id="digit-clock"></div>  
<?php
  //some code here
      echo "Visited time: " . date("Y-m-d h:i:sa")
?>
  <form action="addnewuser.php" method="POST" class="form login">
    Username:<input type="text" class="text_field" name="username" required 
    pattern="^[\w.-]+@[\w-]+(.[\w-]+)*$"
    title="Email address is required as username"
    placeholder="Username is email"
    onchange="this.setCustomeValidity(this.validity.patternMismatch?this.title: ' ');" /> <br>
    Password: <input type="password" class="text_field" name="password" /> <br>
    <button class="button" type="submit">Login</button>
  </form>
</body>
</html>
