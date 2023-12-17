<?php
include './php_utility/connection.php';

session_start();
$emailID = $_SESSION['email'];

$name = '';
$img = '';

// Prepare and execute query to get names and Picture of friends based on user email
$stmt = $conn->prepare("SELECT CONCAT(u.firstName, ' ', u.lastName) AS name, u.picture, p.content, p.likeCount, p.id
                             FROM users u
                             INNER JOIN posts p
                             ON u.email = p.email
                             WHERE u.email = ?");
$stmt->bind_param("s", $emailID);
$stmt->execute();

$post = $stmt->get_result();
$profileFeed = $post->fetch_assoc();
// print_r($profileFeed);

$stmt->close();
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./css/profile.css">
    <title>Document</title>
</head>

<body>

    <div class="root">

        <div class="sidebar">
            <h1 id="logo">Orange</h1>
            <ul>
                <li><a href="./home.php">Home</a></li>
                <li style="background-color: rgb(107, 138, 170);"><a href="./profile.php">Profile</a></li>
                <li><a href="./messenger.php">Messages</a></li>
                <li><a href="./event/calendar.php">Event</a></li>
                <li><a href="./php_utility/logout.php">Log Out</a></li>
            </ul>
        </div>

        <div class="feed-boi-root">

            <div class="feed">

                <div class="post-container">
                    <form id="postForm">
                        <textarea id="postData" placeholder="Enter your post here..."></textarea>
                        <button type="submit">Post</button>
                    </form>
                </div>

                <?php if ($post->num_rows > 0) {
                    while ($row = $post->fetch_assoc()) { ?>
                        <div class="post">
                            <img src="../assets/profiles/<?php echo $row['picture']; ?>" alt="">

                            <div class="post-content">
                                <?php
                                $name = $row['name'];
                                $img = $row['picture'];
                                ?>

                                <div class="xx">
                                    <h3>
                                        <?php echo $name ?>
                                    </h3>

                                    <form action="./model/deletepost.php" method="POST" class="delete-form">
                                        <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="delete-btn" name="delete_post">
                                            Delete &#10006;
                                        </button>
                                    </form>
                                </div>

                                <p class='post-p-tag'>
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
            <div class="bio-container">
                <img src="../assets/profiles/<?php echo $img ?>" alt="">
                <div class="bio">
                    <p>
                        Name <br>
                        <b>
                            <?php echo $name ?>
                        </b><br><br>
                        Age <br>
                        <b>23 years old</b><br><br>
                        Occupation <br>
                        <b>Web developer</b><br><br>
                        Hobbies <br>
                        <b>Rock climbing, bboard games.</b><br><br>
                        Category <br>
                        <b>Studen</b><br><br>
                        Batch <br>
                        <b>202</b><br><br>
                    </p>
                </div>
            </div>
        </div>

    </div>
</body>
<script src="./js/home.js"></script>

</html>