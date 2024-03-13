<?php
// require "./config.php";
require "./Modules/adminmodule.php";
require './Modules/LoginAPI.php';

// $con = Db_Connection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adm_email = trim($_POST["adm_email"]);
    $adm_pass = trim($_POST["adm_password"]);

    Get_Admin($adm_email, $adm_pass);
}
    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Form</title>
    <link rel="stylesheet" href="./assets/css/adminLogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="./assets/JS/jquery-3.6.0.min.js"></script>
    <script src="./assets/JS/admin_login.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">

                    <!-------------      image     ------------->

                    <!-- <img src="../Images/WithoutBackground.png" alt=""> -->


                </div>
                <div class="col-md-6 right">

                    <div class="input-box">

                        <header>Welcome Admin</header>

                        <!-- <img src="https://firebasestorage.googleapis.com/v0/b/adbrokers-86765.appspot.com/o/Profiles%2FFcejZKgNt4Sf7vBBFikMljGQ7F32.jpg?alt=media&token=35619ca0-f208-4a0a-8864-a435be377351" 
alt="Cheetah!" /> -->

                        <form name="loginform" method="post">
                            <div class="input-field">
                                <input type="email" class="input" id="txtemail" name="adm_email" value="" autocomplete="off"
                                    required="Email field can't be empty">
                                <label for="email">Email</label>
                                <span id="emailerror" class="error"></span>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id="txtpassword" name="adm_password"  value=""
                                    required="Password field can't be empty">
                                <label for="pass">Password</label>
                                <span id="passworderror" class="error"></span>
                            </div>
                            <div class="input-field">

                                <input type="submit" class="submit" value="Log in">
                            </div>
                            <div class="signin">
                                <span>Forget Password? <a href="#">Click here</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>