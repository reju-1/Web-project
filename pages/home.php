<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sidebar and Feed</title>
    <link rel="stylesheet" href="./css/home.css">
</head>

<body>

    <div class="root">

        <div class="sidebar">
            <h1 id="logo">Orange</h1>
            <ul>
                <li style="background-color: rgb(107, 138, 170);"><a href="#">Home</a></li>
                <li><a href="./profile.php">Profile</a></li>
                <li><a href="./event/calendar.php">Event</a></li>
                <li><a href="./messenger.php">Messages</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>

        <div class="feed">

            <div class="nav">
                <ul>
                    <li id="explore"><a href="#explore">Explore</a></li>
                    <li><a href="#club">Club</a></li>
                    <li><a href="#forum">Forum</a></li>
                    <li><a href="#research">Research</a></li>

                    <!-- Search bar within a separate container -->
                    <li class="search-container">
                        <form>
                            <input type="text" placeholder="Search...">
                        </form>
                    </li>
                </ul>
            </div>

            <div class="post">
                <img src="../assets/images/profile.avif" alt="Profile Picture">
                <div class="post-content">
                    <h3>John Doe</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, nam totam veritatis neque
                        magni
                        quidem ex! Commodi amet ad unde quasi qui veritatis ipsum! Sequi debitis nemo quasi ea at!
                    </p>

                    <div class="interactions">
                        <button class="like-btn">Like</button>
                        <span class="like-count">0 Likes</span>
                        <button class="comment-btn">Comment</button>
                        <span class="comment-count">0 Comments</span>
                    </div>
                </div>
            </div>

            <div class="post">
                <img src="../assets/images/profile.avif" alt="Profile Picture">
                <div class="post-content">
                    <h3>John Doe</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, nam totam veritatis neque
                        magni
                        quidem ex! Commodi amet ad unde quasi qui veritatis ipsum! Sequi debitis nemo quasi ea at!
                    </p>

                    <div class="interactions">
                        <button class="like-btn">Like</button>
                        <span class="like-count">0 Likes</span>
                        <button class="comment-btn">Comment</button>
                        <span class="comment-count">0 Comments</span>
                    </div>
                </div>
            </div>

            <div class="post">
                <img src="../assets/images/profile.avif" alt="Profile Picture">
                <div class="post-content">
                    <h3>John Doe</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, nam totam veritatis neque
                        magni
                        quidem ex! Commodi amet ad unde quasi qui veritatis ipsum! Sequi debitis nemo quasi ea at!
                    </p>

                    <div class="interactions">
                        <button class="like-btn">Like</button>
                        <span class="like-count">0 Likes</span>
                        <button class="comment-btn">Comment</button>
                        <span class="comment-count">0 Comments</span>
                    </div>
                </div>
            </div>


            <div class="post">
                <img src="../assets/images/profile.avif" alt="Profile Picture">
                <div class="post-content">
                    <h3>John Doe</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, nam totam veritatis neque
                        magni
                        quidem ex! Commodi amet ad unde quasi qui veritatis ipsum! Sequi debitis nemo quasi ea at!
                    </p>

                    <div class="interactions">
                        <button class="like-btn">Like</button>
                        <span class="like-count">0 Likes</span>
                        <button class="comment-btn">Comment</button>
                        <span class="comment-count">0 Comments</span>
                    </div>
                </div>
            </div>


            <div class="post">
                <img src="../assets/images/profile.avif" alt="Profile Picture">
                <div class="post-content">
                    <h3>John Doe</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, nam totam veritatis neque
                        magni
                        quidem ex! Commodi amet ad unde quasi qui veritatis ipsum! Sequi debitis nemo quasi ea at!
                    </p>

                    <div class="interactions">
                        <button class="like-btn">Like</button>
                        <span class="like-count">0 Likes</span>
                        <button class="comment-btn">Comment</button>
                        <span class="comment-count">0 Comments</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="sidebar sidebar-right">
            <h2>Friends</h2>
            <ul class="friends-list">
                <li class="friend">
                    <img src="../assets/images/profile.avif" alt="Friend 1">
                    <span class="friend-name">Friend 1</span>
                </li>

                <li class="friend">
                    <img src="../assets/images/profile.avif" alt="Friend 2">
                    <span class="friend-name">Friend 2</span>
                </li>
            </ul>
        </div>

    </div>
</body>

</html>