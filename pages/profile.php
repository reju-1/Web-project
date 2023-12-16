<?php
include './php_utility/connection.php';

session_start();
$emailID = $_SESSION['email'];

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
print_r($profileFeed);

$stmt->close();
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/profile.css">
    <title>Document</title>
</head>

<body>
    <div class="main_div">


        <!-- LEFT DIV -->


        <div class="left_div">
            <div class="Profile">
                <button class="btn"><i class="fa fa-profile"></i> Profile</button>

                <p> Fabian's lifestyle is quite active. He works out three times a week. His fitness routine is a
                    healthy mix of strength-training and cardio. Apart from fitness, his priority is a healthy and
                    balanced diet. He have some sort of a meal plan, but he is quite fliexible with it. He prefers to do
                    shopping online because it is convenient and less time-consuming, as he can do it whenever it suits
                    him.</p>
            </div>

            <div class="post">
                <button class="btn"><i class="fa fa-post"></i> Post</button>
                <p> 21 August 2022<br><br>
                    Fabian's lifestyle is quite active. He works out three times a week. His fitness routine is a
                    healthy mix of strength-training and cardio. Apart from fitness, his priority is a healthy and
                    balanced diet. He has some sort of a meal plan, but he is quite flexible with it.

                </p>

                <button class="btn"><i class="fa fa-like"></i> Like</button> 209 like
                <button class="btn"><i class="fa fa-comment"></i> Comment</button> 7 comment
                <button class="btn"><i class="fa fa-share"></i> Share</button> Boost
                <br>
                <br>
                <br>
                <br>
                <P>
                    13th Auguest,2022<br><br>
                    I left my heart in the send
                    <br>(add image hare)
                </p>
                <img src="./../assets/profiles/pic-1.jpg" alt="Trulli" width="30" height="70">

                <button class="btn"><i class="fa fa-like"></i> Like</button> 29 like
                <button class="btn"><i class="fa fa-comment"></i> Comment</button>5 comment
                <button class="btn"><i class="fa fa-share"></i> Share</button> Boost
                <P>
                </P>
            </div>
            <!--in needed then add labal code is (<label class="label20">Submit Mid Here</label>)-->






        </div>


        <!-- RIGHT DIV -->


        <div class="right_div">
            <div class="upper">

                <img src="./../assets/profiles/pic-1.jpg" alt="Avatar" style="width:200px">
                <br>(add same image here)


            </div>

            <div class="btns">

                <p>


                    Name <br>
                    <b>Sheik Rakin</b><br><br>
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
</body>

</html>