<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/signUp.css">

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <h2>Join The ORANGE</h2>
        <div class="form-container">
            <form action="./logIn.php">
                <div class="input-name">
                    <i class="fa fa-user-o lock"></i>
                    <input required type="text" placeholder="First Name" class="name">
                    <span>
                        <i class="fa fa-user-o lock"></i>
                        <input required type="text" placeholder="Last Name" class="name">
                    </span>
                </div>
                <div class="input-name">
                    <i class="fa fa-envelope-o lock"></i>
                    <input required type="text" placeholder="Email address" class="data">
                    <span>
                        <i class="fa fa-phone"></i>
                        <input required type="text" placeholder="Phone number" class="data">
                    </span>
                </div>

                <div class="input-name">
                    <i class="fa fa-unlock-alt lock"></i>
                    <input required type="text" placeholder="Enter the password" class="text-name">
                </div>

                <div class="input-name">
                    <i class="fa fa-unlock-alt lock"></i>
                    <input required type="text" placeholder="Enter the password again" class="text-name">
                </div>

                <div class="input-name">

                    <input required type="radio" class="radio-button" name="r1">
                    <lebel style="margin-right: 30px;">Male</lebel>
                    <input required type="radio" class="radio-button" name="r1">
                    <lebel>Female</lebel>
                </div>
                <div class="input-name">

                    <select required class="country">

                        <option>Select a Catagory</option>
                        <option>Teacher</option>
                        <option>Student</option>
                        <option>Alumni</option>
                        <option>Officials</option>


                    </select>
                    <div class="arrow"></div>
                </div>

                <div class="input-name">
                    <input required type="checkbox" class="check-button">
                    <label class="check">I accepet all the term and conditions</label>
                </div>

                <div class="input-name">

                    <input type="Submit" class="button" value="Register">
                    <p id='x'><a href="./logIn.php" id="login-link">Have account? <u>Log In</u></a></p>
                </div>
            </form>
        </div>
    </div>


</body>

</html>