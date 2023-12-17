<?php
include '../php_utility/connection.php';

if (isset($_POST['delete_post'])) {
    $post_id = $_POST['post_id'];


    $sql = "DELETE FROM posts WHERE id = $post_id";

    if ($conn->query($sql) === TRUE) {

        echo "Post with ID $post_id deleted successfully.";
        header("Location: ../profile.php");
        exit();


    } else {

        echo "Error deleting post: " . $conn->error;
        header("Location: ../profile.php");
        exit();
    }
}
?>