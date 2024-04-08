<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>WAPH Team24-Login page</title>
  <script type="text/javascript">
      function displayTime() {
        document.getElementById('digit-clock').innerHTML = "Current time:" + new Date();
      }
      setInterval(displayTime,500);
  </script>
</head>
<body>
  <h1>Mini Facebook Login Form</h1>
  <h2>Student Name</h2>
  <div id="digit-clock"></div>  
<?php
  //some code here
  echo "Visited time: " . date("Y-m-d h:i:sa")
?>
  <form action="index.php" method="POST" class="form login">
    Username:<input type="text" class="text_field" name="username" /> <br>
    Password: <input type="password" class="text_field" name="password" /> <br>
    <button class="button" type="submit">Login</button>
  </form>
</body>
</html>