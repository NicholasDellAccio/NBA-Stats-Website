<?php
include("connection.php");
session_start(); 



if (isset($_POST['user']) && isset($_POST['pass'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT username, password FROM user WHERE username = '$username' AND password = '$password'";
    

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $_SESSION['username'] = $username;
        header("Location: homepage.php");
        
    } else {
        
        echo '<script>
                window.location.href = "login.php";
                alert("Login failed. Invalid username or password!");
              </script>';
    }
}


?>

    
<html>
    <head>
        <title>Login / Sign Up Form</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "./main.css">
    </head>
    <body>
        <div class = "container">
                <form class = "form" action="login.php" id ="login" onsubmit="return isvalid()" method= "POST">
                    <h1 class = "form__title"> Login</h1>
                    
                    <div class ="form__input-group">
                        <input type ="text" id = "user" name = "user" class = "form__input" autofocus placeholder ="Username">
                    </div>
                    <div class ="form__input-group">
                        <input type ="password" id = "pass" name = "pass" class = "form__input" autofocus placeholder ="Password">
                    </div>
                    <button class = "form__button" type ="submit">continue</button>
                    <p class = "form__text">
                        <a class ="form__link" href = "./signup.php" id = "SignUp">Sign up</a>
                    </p>
                </form>
            </div>
            <script>
                function isvalid() {
                    var user = document.getElementById('user').value;
                    var pass = document.getElementById('pass').value;

                    if (user.length === 0 && pass.length === 0) {
                        alert("Username and password fields are empty!!!");
                        return false;
                    } else if (user.length === 0) {
                        alert("Username field is empty!!!");
                        return false;
                    } else if (pass.length === 0) {
                        alert("Password field is empty!!!");
                        return false;
                    }

                    
                    return true;
            }
            </script>

    </body>
</html>