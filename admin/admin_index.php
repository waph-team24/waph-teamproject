<?php
session_set_cookie_params(15*60,"/admin","waph-team24.minifacebook.com",TRUE,TRUE);

session_start();
include 'admindatabase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['disable_user'])) {
        $username = $_POST['username'];
        disableUser($username);
    } elseif (isset($_POST['enable_user'])) {
        $username = $_POST['username'];
        enableUser($username);
    } elseif (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $superuser = checkSuperuserLogin($username, $password);
        if ($superuser) {
            $_SESSION['superuser_authenticated'] = true;
            $_SESSION['superuser_username'] = $superuser['username'];
        } else {
            $error = "Invalid username/password";
        }
    }
    
}
if(!isset($_SESSION['superuser_authenticated'])){
    echo "<script>alert('You cannot go here!');window.location='admin_form.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Admin Panel</h1>
    <h2>Welcome, <?php echo isset($_SESSION['superuser_username']) ? $_SESSION['superuser_username'] : 'Admin'; ?>!</h2>
    <a class="btn btn-primary" href="admin_logout.php">Logout</a>
    <br><br>
    <h2>User Management</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-danger" name="disable_user">Disable User</button>
        <button type="submit" class="btn btn-success" name="enable_user">Enable User</button>
    </form>
</div>
</body>
</html>
