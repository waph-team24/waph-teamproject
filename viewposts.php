<?php
session_start();
include 'database.php';

// Fetch all posts
$posts = getAllPosts();

// Function to add new comment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['postID']) && isset($_POST['comment']) && isset($_POST['commenter'])) {
        $postID = $_POST['postID'];
        $comment = $_POST['comment'];
        $commenter = $_POST['commenter'];

        if (addNewComment($postID, $comment, $commenter)) {
            $message = "Comment added successfully!";
        } else {
            $error = "Error adding comment!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Posts</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .comment-container {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">View Posts</h1>
    <h3><a class="btn btn-primary" href="addpost.php">Add Post</a></h3>
    <?php foreach ($posts as $post): ?>
        <div class="post">
            <h2><?php echo htmlspecialchars($post['title']); ?></h2>
            <p><?php echo htmlspecialchars($post['content']); ?></p>
            <p>Posted by: <?php echo htmlspecialchars($post['owner']); ?></p>
            <p>Posted at: <?php echo htmlspecialchars($post['posttime']); ?></p>
            <?php 
            // Check if user is logged in and is the owner of the post
            if(isset($_SESSION['username']) && $_SESSION['username'] == $post['owner']): ?>
                <a class="btn btn-sm btn-primary" href="editpost.php?postID=<?php echo $post['postID'].'&csrf='. $_SESSION['csrf']; ?>">Edit</a>
                <a class="btn btn-sm btn-danger" href="deletepost.php?postID=<?php echo $post['postID'].'&csrf='. $_SESSION['csrf']; ?>">Delete</a>
            <?php endif; ?>
            <h3>Comments:</h3>
            <?php
                // Fetch comments for each post
                $postID = $post['postID'];
                $comment_query = "SELECT * FROM comments WHERE postID = ?";
                $stmt = $mysqli->prepare($comment_query);
                $stmt->bind_param("s", $postID);
                $stmt->execute();
                $comment_result = $stmt->get_result();

                if ($comment_result) {
                    while ($comment = $comment_result->fetch_assoc()) {
            ?>
                        <div class="comment-container">
                            <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                            <p>Comment by: <?php echo htmlspecialchars($comment['commenter']); ?></p>
                            <p>Commented at: <?php echo htmlspecialchars($comment['commentTime']); ?></p>
                        </div>
            <?php 
                    }
                } else {
                    echo "Error: " . $mysqli->error;
                }
            ?>
            <hr>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <input type="hidden" name="postID" value="<?php echo $postID; ?>">
                <div class="form-group">
                    <label for="comment">Add Comment:</label>
                    <textarea class="form-control" id="comment" name="comment" rows="2" required></textarea>
                </div>
                <div class="form-group">
                    <label for="commenter">Your Username:</label>
                    <input type="text" class="form-control" id="commenter" name="commenter" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
            <?php if (isset($message)): ?>
                <p style="color: green;"><?php echo $message; ?></p>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
<a href="index.php" class="btn btn-secondary">Go back</a>
</body>
</html>
