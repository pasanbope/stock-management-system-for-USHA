<?php
include 'DbCon.php';
$valid = true;
// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_COOKIE['user_details'])) {
    header('Location: index.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Perform the login check
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) > 0) {
         $user = mysqli_fetch_assoc($result);
         // Set the user details as a cookie
        $cookieValue = serialize($user); // Serialize the user details
        setcookie("user_details", $cookieValue, time() + 86400, "/"); // Set the cookie for 24 hours

        // if email is admin redirect to admin page
        if ($user['username'] == 'admin') {
            setcookie("admin", true, time() + 86400, "/");
        }

        // Login successful, redirect the user to another page
        header('Location: index.php');
        exit();
    } else {
        $valid = false;
    }
}
?>
<!doctype html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>USHA - Loging</title>
        <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' rel='stylesheet'>
        <style>@import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap');

            .error {
                color: red;
                font-weight: bold;
            }

            * {
                padding: 0;
                margin: 0;
                box-sizing: border-box
            }

            body {
                background-color: #ff0000;
                height: 100vh;
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(to top, #ff0000 10%, rgb(255, 0, 0) 90%) no-repeat
            }

            .wrapper {
                max-width: 500px;
                border-radius: 10px;
                margin: 50px auto;
                padding: 30px 40px;
                box-shadow: 20px 20px 80px rgb(254, 0, 0)
            }

            .h2 {
                /* font-family: 'Kaushan Script', cursive; */
                font-size: 3.5rem;
                font-weight: bold;
                color: #ff0000;
                font-style: italic
            }

            .h4 {
                font-family: 'Poppins', sans-serif
            }

            .input-field {
                border-radius: 5px;
                padding: 5px;
                display: flex;
                align-items: center;
                cursor: pointer;
                border: 1px solid #400485;
                color: #400485
            }

            .input-field:hover {
                color: #7b4ca0;
                border: 1px solid #7b4ca0
            }

            input {
                border: none;
                outline: none;
                box-shadow: none;
                width: 100%;
                padding: 0px 2px;
                font-family: 'Poppins', sans-serif
            }

            .fa-eye-slash.btn {
                border: none;
                outline: none;
                box-shadow: none
            }

            a {
                text-decoration: none;
                color: #400485;
                font-weight: 700
            }

            a:hover {
                text-decoration: none;
                color: #7b4ca0
            }

            .option {
                position: relative;
                padding-left: 30px;
                cursor: pointer
            }

            .option label.text-muted {
                display: block;
                cursor: pointer
            }

            .option input {
                display: none
            }

            .checkmark {
                position: absolute;
                top: 3px;
                left: 0;
                height: 20px;
                width: 20px;
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 50%;
                cursor: pointer
            }

            .option input:checked~.checkmark:after {
                display: block
            }

            .option .checkmark:after {
                content: "";
                width: 13px;
                height: 13px;
                display: block;
                background: #400485;
                position: absolute;
                top: 48%;
                left: 53%;
                border-radius: 50%;
                transform: translate(-50%, -50%) scale(0);
                transition: 300ms ease-in-out 0s
            }

            .option input[type="radio"]:checked~.checkmark {
                background: #fff;
                transition: 300ms ease-in-out 0s;
                border: 1px solid #400485
            }

            .option input[type="radio"]:checked~.checkmark:after {
                transform: translate(-50%, -50%) scale(1)
            }

            .btn.btn-block {
                border-radius: 20px;
                background-color: #ff0000;
                color: #fff
            }

            .btn.btn-block:hover {
                background-color: #ff490ce0
            }

            @media(max-width: 575px) {
                .wrapper {
                    margin: 10px
                }
            }

            @media(max-width:424px) {
                .wrapper {
                    padding: 279px 10px;
                    margin: 5px
                }

                .option {
                    position: relative;
                    padding-left: 22px
                }

                .option label.text-muted {
                    font-size: 0.95rem
                }

                .checkmark {
                    position: absolute;
                    top: 2px
                }

                .option .checkmark:after {
                    top: 50%
                }

                #forgot {
                    font-size: 0.95rem
                }
            }
        </style>
        <script type='text/javascript' src=''></script>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
    </head>
    <body oncontextmenu='return false' class='snippet-body'>
        <div class="wrapper bg-white">
            <a href="index.php"><div class="text-center"><img src="img/usha log.png" alt=""></div></a>
            <div class="h4 text-muted text-center pt-2">Enter your login details</div>
            <form class="pt-3" method="post" action="login.php">
                <div class="form-group py-2">
                    <div class="input-field"> <span class="far fa-user p-2"></span> <input type="text" placeholder="Enter Your Username" required class="" name="username"> </div>
                </div>
                <div class="form-group py-1 pb-2">
                    <div class="input-field"> <span class="fas fa-lock p-2"></span> <input type="password" placeholder="Enter your Password" required class="" name="password"> </div>
                </div>
                <div class="d-flex align-items-start">
                    <!-- <div class="remember"> <label class="option text-muted"> Remember me <input type="radio" name="radio"> <span class="checkmark"></span> </label> </div>
                    <div class="ml-auto"> <a href="#" id="forgot">Forgot Password?</a> </div> -->
                </div> <button class="btn btn-block text-center my-3">Log in</button>
                <!-- <div class="text-center pt-3 text-muted">Not a member? <a href="#">Sign up</a></div> -->
            </form>
        </div>
        <?php 
        if (!$valid) {
            echo "<script>alert('Invalid username or password.');</script>";
        } 
?>
    <script type='text/javascript'></script>
    </body>
</html>