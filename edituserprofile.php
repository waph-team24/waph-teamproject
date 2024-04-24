<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Profile Result</title>
</head>
<body>

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
        } else {
            echo "<div class='alert alert-danger' role='alert'>Failed to update profile</div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>No username provided</div>";
    }

    $token.die();
    ?>
    <a href="logout.php">Logout</a>
</div>


</body>
</html>
