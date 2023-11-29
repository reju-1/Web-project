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
        <form action="./home.php">
            <div class="input-name">
                <i class="fa fa-user-o lock"></i>
                <input type="text" placeholder="Username" class="text-name">
            </div>

            <div class="input-name">
                <i class="fa fa-unlock-alt lock"></i>
                <input type="text" placeholder="Password" class="text-name">
            </div>
            <div class="input-name">
                <input type="Submit" class="button" value="Log In">

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