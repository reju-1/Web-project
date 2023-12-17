<?php
include './php_utility/connection.php';
echo 'dl';  //////// page is not working
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $postId = $_POST['postId'];
    $action = $_POST['action'];

    if ($action === 'like') {
        // Update the like count in the database for the specific post
        $sql = "UPDATE posts SET likeCount = likeCount + 1 WHERE id = $postId";

        if (mysqli_query($conn, $sql)) {
            echo 'liked';
        } else {
            echo 'error';
        }
    } elseif ($action === 'unlike') {
        // Update the like count in the database for the specific post
        $sql = "UPDATE posts SET likeCount = likeCount - 1 WHERE id = $postId";

        if (mysqli_query($conn, $sql)) {
            echo 'unliked';
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }
}

mysqli_close($conn);

?>