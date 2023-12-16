<?php
include './php_utility/connection.php';
session_start();

if (isset($_POST['submit'])) {

    $username = $_POST['email'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $stmt->close();
        $conn->close();

        if ($pass == $user['password']) {

            $_SESSION['email'] = $user['email'];
            $_SESSION['logged_in'] = true;

            header("Location: ./home.php");
            exit();
        }
    }

    // Invalid credentials, set a flag to indicate unsuccessful login
    $_SESSION['login_error'] = true;
    header("Location: ./logIn.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/logIn.css">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="f1">
        <h1 class="orange">
            ORANGE
        </h1>
        <h3 class="the">An UIU Social Midea Platform</h3>
    </div>

    <div class="container">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="input-name">
                <i class="fa fa-user-o lock"></i>
                <input name="email" type="email" placeholder="Username" class="text-name">
            </div>

            <div class="input-name">
                <i class="fa fa-unlock-alt lock"></i>
                <input name="password" type="password" placeholder="Password" class="text-name">
                <?php

                // Check if login error flag is set
                if (isset($_SESSION['login_error']) && $_SESSION['login_error']) {
                    echo '<p style="color: red; font-size:1.2rem; margin-top:10px; margin-bottom:0px;"> ** Invalid Information **</p>';
                    // Unset the login error flag after displaying the message
                    unset($_SESSION['login_error']);
                }
                ?>
            </div>
            <div class="input-name">
                <input name="submit" type="Submit" class="button" value="Log In">

            </div>
            <div class="text">
                <p class="p1"> <a href="./forget.php">Forget Password?</a></p>
                <p class="p2">Haven't an account?</p>
                <a href="./signUp.php" class="p3">Sign up</a>
            </div>
        </form>
    </div>

</body>

</html>