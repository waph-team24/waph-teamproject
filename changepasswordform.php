<?php
    require "session_auth.php";
    $rand = bin2hex(openssl_random_pseudo_bytes(16));
    $_SESSION["nocsrftoken"]=$rand;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>WAPH-Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://cdn.vectorstock.com/i/preview-1x/87/58/password-protection-icon-on-blue-background-vector-21658758.webp'); /* Your background image URL */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            width: 400px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1, h2 {
            color: #004080; /* Dark blue color */
        }
        form {
            margin-top: 20px;
        }
        label {
            margin-bottom: 10px;
        }
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Change Password, WAPH</h1>
        <h2>WAPH-TEAM24</h2>
        <form action="changepassword.php" method="POST" onsubmit="return validateForm();">
            <label for="username">Username: <?php echo htmlentities($_SESSION['username']); ?></label>
            <input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>"/>
            <br><br>
            <label for="oldpassword">Old Password:</label>
            <input type="password" name="oldpassword" placeholder="Enter your old Password" required>
            <div class="error" id="oldpassword_error">Please type your old password</div>
            <br><br>
            <label for="newpassword">New Password:</label>
            <input type="password" name="newpassword" placeholder="Enter new Password" pattern="^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$"  title="Password much have at least 8 characters with 1 special symbol !@#$%^& 1 number, 1 lowercase and 1 UPPERCASE" onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : ''); form.confirmpassword.pattern = this.value;" required>
            <div class="error" id="newpassword_error">Password missed some must required characters</div>
            <br><br>
             <label for="newpassword">Re-enter New Password:</label>
            <input type="password" name="newpassword" class="form-control" required
                   placeholder="Retype new password" title="Passwords do not match"
                   onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');"/>
            <div class="error" id="confirmpassword_error">Password does not match</div>
            <br><br>
            <input type="submit" value="Change Password">
        </form>
    </div>
    <script>
        function validateForm() {
            var oldpassword = document.getElementsByName("oldpassword")[0].value.trim();
            var newpassword = document.getElementsByName("newpassword")[0].value.trim();
            var confirmPassword = document.getElementsByName("confirmpassword")[0].value.trim();
            var isValid = true;

            document.getElementById("oldpassword_error").style.display = "none";
            document.getElementById("newpassword_error").style.display = "none";
            document.getElementById("confirmpassword_error").style.display = "none";

            if (oldpassword === "") {
                document.getElementById("oldpassword_error").style.display = "block";
                isValid = false;
            }

            if (newpassword === "" || !isValidPassword(newpassword)) {
                document.getElementById("newpassword_error").style.display = "block";
                isValid = false;
            }

            if (confirmPassword === "" || confirmPassword !== newpassword) {
                document.getElementById("confirmpassword_error").style.display = "block";
                isValid = false;
            }

            return isValid;
        }

        function isValidPassword(newpassword) {
            var passwordRegex = new RegExp(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/);
            return passwordRegex.test(newpassword);
        }
    </script>
</body>
</html>

