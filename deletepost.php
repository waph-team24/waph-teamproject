<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['postID'])) {
    $postID = $_GET['postID'];
    // Fetch post details
    $query = "SELECT * FROM posts WHERE postID = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $postID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $post = $result->fetch_assoc();
        // Check if the logged-in user is the owner of the post
        if (isset($_SESSION['username']) && $_SESSION['username'] == $post['owner']) {
            $query = "DELETE FROM posts WHERE postID = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("s", $postID);
            if ($stmt->execute()) {
                header("Location: viewposts.php");
                exit();
            } else {
                $error = "Error deleting post!";
            }
        } else {
            echo "You are not authorized to delete this post!";
            exit();
        }
    } else {
        echo "Post not found!";
        exit();
    }
} else {
    echo "Invalid request!";
    exit();
}
?>
