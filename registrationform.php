
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>WAPH-Login page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #76b8d9;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    h1, h2 {
      text-align: center;
      color: #333;
    }
    #digit-clock {
      text-align: center;
      font-size: 18px;
      margin-bottom: 20px;
    }
    .container {
      width: 350px;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    .form.login {
      margin-bottom: 20px;
      background-color: #f0f0f0; /* Light gray */
      padding: 15px;
      border-radius: 5px;
      background-image: url('https://img.freepik.com/premium-photo/facebook-background-with-logos_125322-28.jpg?w=740'); /* Replace 'your-image-url.jpg' with the URL of your image */
      background-size: cover;
      background-position: center;
    }
    .text_field {
      width: 100%;
      margin-bottom: 10px;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
    }
    .button {
      width: 100%;
      padding: 10px;
      background-color: #329fcf;
      color: #fff;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    .button:hover {
      background-color: #45a049;
    }
  </style>
  <script>
    function displayTime() {
      document.getElementById('digit-clock').innerHTML = "Current time: " + new Date().toLocaleString();
    }
    setInterval(displayTime, 1000);
    
    function validatePassword() {
      var password = document.getElementById("password").value;
      var retypePassword = document.getElementById("retype-password").value;
      if (password !== retypePassword) {
        document.getElementById("retype-password").setCustomValidity("Passwords don't match");
      } else {
        document.getElementById("retype-password").setCustomValidity('');
      }
    }
  </script>
</head>
<body>
  <div class="container">
    <h1>New User Registration</h1>
    <h2>WAPH-TEAM24</h2>
    <div id="digit-clock"></div>  

    <form action="addnewuser.php" method="POST" class="form login">
      Username:<input type="email" class="text_field" name="username" required 
      pattern="^[\w.-]+@[\w-]+(\.[\w-]+)*$" title="Email address is required as username" placeholder="Username is email" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');"/> <br>
      
      Password: <input type="password" class="text_field" id="password" name="password" required 
      pattern="^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&])[A-Za-z0-9!@#$%^&]{8,}$" 
      title="Password must have at least 8 characters with 1 special symbol (!@#$%^&), 1 number, 1 lowercase, and 1 uppercase"
      placeholder="Enter the Password" 
      onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');"/><br>

      Retype Password:<input type="password" class="text_field" id="retype-password" name="repassword"
      placeholder="Re-enter the Password" required 
      title="Password does not match" 
      onchange="validatePassword()"/> <br>

      Fullname:<input type="text" class="text_field" name="fullname" 
      placeholder="Please provide fullname"/> <br>
      Other Email:<input type="email" class="text_field" name="otheremail" 
      placeholder="Please provide email"/> <br>
      Phone:<input type="text" class="text_field" name="phone" 
      placeholder="Please provide phonenumber"/> <br>
      <button class="button" type="submit">Register</button>
    </form>
  </div>
</body>
</html>
