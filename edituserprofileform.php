<?php
require "session_auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://img.freepik.com/premium-photo/facebook-template-3d-illustration_665513-4.jpg?w=740'); /* Replace 'path/to/your/image.jpg' with the path to your image */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        h1 {
            color: #004080; /* Blue color */
            text-align: center;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #007bff; /* Blue border color on focus */
            outline: none;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Edit User Profile Form</h1>
        <p>Visited time: <?php echo date("Y-m-d h:i:sa"); ?></p>
        <form action="edituserprofile.php" method="POST" class="form">
            <input type="hidden" name="username" value="<?php echo htmlentities($_SESSION["username"]);?>"/><br>
            <div class="form-group">
                <label for="name" style="display: inline-block; width: 120px;">Enter the New Name:</label>
                <input type="text" class="form-control" name="nfullname" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="email" style="display: inline-block; width: 120px;">New Email:</label>
                <input type="email" class="form-control" name="notheremail" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="phone" style="display: inline-block; width: 120px;">New Phone:</label>
                <input type="text" class="form-control" name="nphone" placeholder="Enter phone">
            </div>
            <input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>"/>
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>

</body>
</html>
