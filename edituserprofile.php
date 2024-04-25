
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        require "session_auth.php";
        require "database.php";
        $username = $_POST["username"];
        $fullname = $_POST["nfullname"];
        $otheremail = $_POST["notheremail"];
        $phone = $_POST["nphone"];

        $token = $_POST['nocsrftoken'];

        if (!isset($token) || ($token != $_SESSION["nocsrftoken"])) {
            echo "<div class='alert alert-danger' role='alert'>CSRF Attack is detected</div>";
            die();
        }

        if (isset($username) and isset($fullname) and isset($otheremail) and isset($phone))  {
            if (editprofile($username, $fullname, $otheremail, $phone)) {
                echo "<div class='alert alert-success' role='alert'>Profile updated successfully</div>";
                echo "<a href='https://waph-team24.minifacebook.com/index.php'>Go Home</a>";

            } else {
                echo "<div class='alert alert-danger' role='alert'>Failed to update profile</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>No username provided</div>";
        }

        $token.die();
        ?>
        <br>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>

