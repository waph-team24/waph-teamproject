<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['postID'])) {
    $postID = $_GET['postID'];
    // Fetch post details
    $post = getPostById($postID);
    
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postID = $_POST['postID'];
    // Fetch post details
    $post = getPostById($postID);
    if (isset($_SESSION['username']) && $_SESSION['username'] == $post['owner']) {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title']) && isset($_POST['content'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            if (editPost($postID, $title, $content)) {
                header("Location: viewposts.php");
                exit();
            } else {
                $error = "Error updating post!";
            }
        }
    } else {
        
        echo "You are not authorized to edit this post!";
        echo "<br>";
        echo $_SESSION['username'];
        echo "<br>";
        echo $post['owner'];
        echo '<br>';
        echo "<a href='viewposts.php'>Back to View Posts</a>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Post</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <input type="hidden" name="postID" value="<?php echo $post['postID']; ?>">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $post['title']; ?>" required><br><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="4" cols="50" required><?php echo $post['content']; ?></textarea><br><br>
        <input type="submit" value="Update Post">
    </form>
</body>
</html>
