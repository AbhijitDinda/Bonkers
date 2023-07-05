<?php
session_start();

if (isset($_SESSION['id'])) {
   
    header('Location: ./home.php');
    exit();
}







include './connection.php';





?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>LogIn</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Konkhmer+Sleokchher&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        
    </header>

    <div class="container">
        <div class="text">
            <h2>My Account</h2>
        </div>
<!-- <form name="loginForm" method="POST" action="./process_login_signup.php" class="forms-sample"> -->
        <form name="loginForm" method="POST" action="./process_login_signup.php" class="forms-sample" onsubmit="return validateLoginForm()">
            <div class="row">

                <div class="col-1">
                    <h2>LOGIN</h2>
                    <div class="username">
                        <label for="username" class="user-text-usename"><br>USERNAME OR EMAIL ADDRESS<span class="star">*</span></br> </label>
                        <input type="text" placeholder="username or mail" name="username_log"  required>
                    </div>
                    <div class="password">
                        <label for="pws" class="user-text-password"><br>PASSWORD<span class="star">*</span></br> </label>
                        <input type="password" placeholder="Enter password" name="pws_log" required>
                    </div>
                    <div class="checkbox">
                        <label class="text-checbox">
                            <input type="checkbox" class="check" name="remember">Rememeber me</label>
                        </label>
                    </div>
                    <div class="fot-password">
                        <a href="./forget-password.php" id="id-forgot">Forget password? </a>
                    </div>
                    <div class="button_login">
                        <button type="submit" name="login" onclick="return validateLoginForm()" >Login</button>
                    </div>
                    <div class="img-col-1">
                        <div class="img-row-fa">
                            <a href="#" class="fb_btn">
                                <button class="btn_face">
                                    <a href="#" class="face">
                                        <i class="fa-brands fa-facebook" class="img-face"></i>
                                        Login With Facebook</a>
                                </button>
                            </a>
                        </div>
                        <div class="img-row-goog">
                            <a href="#" class="google_btn">
                                <button class="btn_goog">
                                    <a href="#" class="goog">
                                        <i class="fa-brands fa-google" class="img-goog"></i>
                                        Login With google</a>
                                </button>
                            </a>
                        </div>
                    </div>


                </div>
        </form>
        <div class="col-2">
            <!-- <form name="registrationForm" method="POST" action="./process_login_signup.php" class="forms-sample"> -->
            <form name="registrationForm" method="POST" action="./process_login_signup.php" class="forms-sample" onsubmit="return validateRegistrationForm()">

                <h2>REGISTRATION</h2>
                <div class="email">
                    <label for="email" class="user-text-email"><br>EMAIL ADDRESS<span class="star">*</span></br>
                    </label>
                    <input type="text" placeholder="Enter email" name="username_reg" required>
                </div>
                <div class="pass">
                    <label for="psw" class="user-text-pass"><br>PASSWORD<span class="star">*</span></br> </label>
                    <input type="password" placeholder="Enter password" name="psw_reg" required>
                </div>
                <div class="button">
                    <button type="submit" name="register" onclick="return validateRegistrationForm()">Register</button>
                </div>
                <div class="img-col">
                    <div class="img-row-1">
                        <a href="#" class="fb_button">
                            <button type="submit" class="btn_facebook">
                                <a href="#" class="face-btn">
                                    <i class="fa-brands fa-facebook" class="img-facebook"></i>
                                    Login With Facebook</a>
                            </button>
                        </a>
                    </div>
                    <div class="img-row-2">
                        <a href="#" class="google_button">
                            <button class="btn_google">
                                <a href="#" class="goog-btn">
                                    <i class="fa-brands fa-google" class="img-google"></i>
                                    Login With google</a>
                            </button>
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
    </div>

    <?php  
        include './footer_script.php';
        ?>

    <script>
         
        function validateLoginForm() {
            var username = document.forms["loginForm"]["username_log"].value;
            var password = document.forms["loginForm"]["pws_log"].value;

            if (username.trim() === "") {
                alert("Please enter a username or email address.");
                return false;
            }

            if (password.trim() === "") {
                alert("Please enter a password.");
                return false;
            }
        }
        

        function validateRegistrationForm() {
            var email = document.forms["registrationForm"]["username_reg"].value;
            var password = document.forms["registrationForm"]["psw_reg"].value;

            if (email.trim() === "") {
                alert("Please enter an email address.");
                return false;
            }

            if (password.trim() === "") {
                alert("Please enter a password.");
                return false;
            }
        }
        
   
    </script>
    


   

</body>

</html>