<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>WAPH Team24-Login page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url('https://img.freepik.com/premium-photo/pile-3d-facebook-logos_823919-1560.jpg?w=740');
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      width: 350px;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    h1, h2 {
      text-align: center;
      color: #333;
    }
    h1 {
      color: #004080; /* Dark blue color */
      margin-bottom: 20px;
    }
    #digit-clock {
      text-align: center;
      font-size: 18px;
      margin-bottom: 20px;
    }
    .form {
      margin-bottom: 20px;
    }
    .text_field {
      width: 100%;
      margin-bottom: 10px;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
      transition: border-color 0.3s ease; /* Smooth transition for border color */
    }
    .text_field:focus {
      border-color: #007bff; /* Blue border color on focus */
    }
    .button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    .button:hover {
      background-color: #0056b3;
    }
  </style>
  <script type="text/javascript">
    function displayTime() {
      document.getElementById('digit-clock').innerHTML = "Current time:" + new Date();
    }
    setInterval(displayTime, 500);
  </script>
</head>
<body>
  <div class="container">
    <h1>Mini Facebook Login Form</h1>
    <h2>WAPH-TEAM24</h2>
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
    
    <form action="registrationform.php" method="POST" class="form register">
      <button class="button" type="submit">Signup</button>
    </form>
  </div>
</body>
</html>


