<?php
include './php_utility/connection.php';

session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: ./logIn.php");
    exit();
}

$emailID = $_SESSION['email'];

$friendQuary = "SELECT CONCAT(u.firstName,' ',u.lastName) as name, u.picture, u.email
                    FROM `friends` f
                    INNER JOIN `users` u
                    ON f.friend = u.email
                    WHERE f.userId = ?";
$postQuary = "SELECT CONCAT(u.firstName, ' ', u.lastName) AS name, u.picture, p.content, p.likeCount, p.id
                    FROM users u
                    INNER JOIN posts p
                    ON u.email = p.email";

// geting all the posts
$postStmt = $conn->prepare($postQuary);
$postStmt->execute();

$post = $postStmt->get_result();
$postStmt->close();

// geting all the friends
$friendStmt = $conn->prepare($friendQuary);
$friendStmt->bind_param("s", $emailID);
$friendStmt->execute();

$friends = $friendStmt->get_result();
$friendStmt->close();

$conn->close();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sidebar and Feed</title>
    <link rel="stylesheet" href="./css/home.css">
</head>
<style>
    .like-btn {
        background-color: #efefef;
        /* Other button styles */

        /* Hover effect */
    }

    .like-btn:hover {
        background-color: orange;
        /* Other hover styles */
    }
</style>

<body>

    <div class="root">

        <div class="sidebar">
            <h1 id="logo">Orange</h1>
            <ul>
                <li style="background-color: rgb(107, 138, 170);"><a href="./home.php">Home</a></li>
                <li><a href="./profile.php">Profile</a></li>
                <li><a href="./messenger.php">Messages</a></li>
                <li><a href="./event/calendar.php">Event</a></li>
                <li><a href="./php_utility/logout.php">Log Out</a></li>
            </ul>
        </div>

        <div class="feed">

            <div class="nav">
                <ul>
                    <li id="explore"><a href="#explore">Explore</a></li>
                    <li><a href="./club_foram.php">Club & Forum</a></li>
                    <li><a href="#research">Research</a></li>

                    <!-- Search bar within a separate container -->
                    <li class="search-container">
                        <form>
                            <input type="text" placeholder="Search...">
                        </form>
                    </li>
                </ul>
            </div>

            <div class="post-container">
                <form id="postForm">
                    <textarea id="postData" placeholder="Enter your post here..."></textarea>
                    <button type="submit">Post</button>
                </form>
            </div>

            <?php if ($post->num_rows > 0) {
                while ($row = $post->fetch_assoc()) { ?>
                    <div class="post" id="<?php echo $row['id'] ?>">
                        <img src="../assets/profiles/<?php echo $row['picture']; ?>" alt="">

                        <div class="post-content">
                            <h3>
                                <?php echo $row['name']; ?>
                            </h3>
                            <p>
                                <?php echo $row['content']; ?>
                            </p>

                            <div class="interactions">
                                <button class="like-btn" id="<?php echo $row['id']; ?>">Like</button>
                                <span class="like-count">
                                    <?php echo $row['likeCount'] . ' Likes '; ?>
                                </span>
                                <!-- <button class="comment-btn">Comment</button>
                                <span class="comment-count">0 Comments</span> -->
                            </div>
                        </div>
                    </div>
                <?php }
            } else {
                echo "no post found";
            } ?>
        </div>

        <div class="sidebar sidebar-right">
            <h2>Friends</h2>
            <ul class="friends-list">

                <?php if ($friends->num_rows > 0) {
                    while ($row = $friends->fetch_assoc()) { ?>
                        <li class="friend">

                            <img src="../assets/profiles/<?php echo $row['picture'] ?>" alt="Friend 1">
                            <span class="friend-name">
                                <?php echo $row['name'] ?>
                            </span>
                        </li>

                    <?php }
                } ?>
            </ul>
        </div>

    </div>
</body>
<script src="./js/home.js"></script>

<script>
    // JavaScript
    document.addEventListener('DOMContentLoaded', function () {
        const likeButtons = document.querySelectorAll('.like-btn');

        likeButtons.forEach(function (button) {
            let isLiked = false;
            let likeCount = parseInt(button.nextElementSibling.textContent); // Get initial like count

            button.addEventListener('click', function () {
                if (!isLiked) {
                    likeCount++;
                    button.style.backgroundColor = '#3498db';
                } else {
                    likeCount--;
                    button.style.backgroundColor = '#efefef';
                }

                isLiked = !isLiked;
                button.nextElementSibling.textContent = likeCount + (likeCount === 1 ? ' Like' : ' Likes');
            });

            button.addEventListener('mouseover', function () {
                if (!isLiked) {
                    button.style.backgroundColor = 'orange';
                }
            });

            button.addEventListener('mouseout', function () {
                if (!isLiked) {
                    button.style.backgroundColor = '#efefef';
                }
            });
        });
    });
</script>

</html>