<?php
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
$users = getAllUsers();
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
    <h2>Welcome Admin, <?php echo $_SESSION['superuser_username']; ?>!</h2>
    <a href="admin_logout.php" class="btn btn-primary">Logout</a>
    <br><br>
    <h2>User Management</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['status']; ?></td>
                    <td>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <input type="hidden" name="username" value="<?php echo $user['username']; ?>">
                            <?php if ($user['status'] == 'active'): ?>
                                <button type="submit" class="btn btn-danger" name="disable_user">Disable User</button>
                            <?php else: ?>
                                <button type="submit" class="btn btn-success" name="enable_user">Enable User</button>
                            <?php endif; ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
