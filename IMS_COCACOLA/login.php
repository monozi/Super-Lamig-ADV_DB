<?php
session_start();
if (isset($_SESSION["users"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="logregstyle.css">
    <title>Coca-Cola</title>
</head>
<body>
    <h1>Inventory Management System</h1>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $username = $_POST["username"];
           $password = $_POST["password"];
            require_once "db.php";
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["users"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Username does not match</div>";
            }
        }
        ?>
        <!---------------------------- login --------------------------------------->
    <div class="container">
        <div class="box">
            <div class="box-login" id="login">
                <div class="top-header">
                    <h3>Welcome!</h3>
                    <small>We are happy to have you back.</small>
                </div>
                <div class="input-group">
                    <div class="input-field">
                        <input type="text" class="input-box" id="logUser" required>
                        <label for="logUser">Username</label>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input-box" id="logPassword" required>
                        <label for="logPassword">Password</label>
                        <div class="eye-area">
                            <div  class="eye-box" onclick="myLogPassword()">
                                <i class="fa-regular fa-eye" id="eye"></i>
                                <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                            </div>
                        </div>
                    </div>
                    <div class="remember">
                        <input type="checkbox" id="formCheck" class="check">
                        <label for="formCheck">Remember Me</label>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="input-submit" value="Sign In" required>
                    </div>
                    <div class="forgot">
                        <a href="#">Forgot password?</a>
                    </div>
                    
                </div>
            </div>

            <!---------------------------- register --------------------------------------->

            <div class="box-register" id="register">
                <div class="top-header">
                    <h3>Sign Up</h3>
                    <small>We are happy to have you with us.</small>
                </div>
                <div class="input-group">
                    <div class="input-field">
                        <input type="text" class="input-box" id="regUsername" required>
                        <label for="regUsername">Username</label>
                    </div>
                    <div class="input-field">
                        <input type="text" class="input-box" id="regEmail"  required>
                        <label for="regEmail">Email address</label>
                    </div>
                    <div class="input-field">
                        <input type="password" class="input-box" id="regPassword"  required>
                        <label for="regPassword">Password</label>
                        <div class="eye-area">
                            <div  class="eye-box" onclick="myRegPassword()">
                                <i class="fa-regular fa-eye" id="eye-2"></i>
                                <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="remember">
                        <input type="checkbox" id="formCheck2" class="check">
                        <label for="formCheck2">Remember Me</label>
                    </div>
                    <div class="input-field">
                        <input type="submit" class="input-submit" value="Sign Up" required>
                    </div>
                </div>
            </div>
            <div class="switch">
                <a href="#" class="login active" onclick="login()">Login</a>
                <a href="#" class="register" onclick="register()">Register</a>
                <div class="btn-active" id="btn"></div>
            </div>
        </div>
    </div>
    <script>
        var x = document.getElementById('login');
        var y = document.getElementById('register');
        var z = document.getElementById('btn');

        function login(){
            x.style.left = "27px";
            y.style.right = "-350px";
            z.style.left = "0px";
        }
        function register(){
            x.style.left = "-350px";
            y.style.right = "25px";
            z.style.left = "150px";
        }


   // View Password codes

        function myLogPassword(){

        var a = document.getElementById("logPassword");
        var b = document.getElementById("eye");
        var c = document.getElementById("eye-slash");

        if(a.type === "password"){
            a.type = "text";
            b.style.opacity = "0";
            c.style.opacity = "1";
        }else{
            a.type = "password";
            b.style.opacity = "1";
            c.style.opacity = "0";
        }

        }

        function myRegPassword(){
    
        var d = document.getElementById("regPassword");
        var b = document.getElementById("eye-2");
        var c = document.getElementById("eye-slash-2");

        if(d.type === "password"){
            d.type = "text";
            b.style.opacity = "0";
            c.style.opacity = "1";
        }else{
            d.type = "password";
            b.style.opacity = "1";
            c.style.opacity = "0";
        }

        }
    </script>
</div>
</body>
</html>
