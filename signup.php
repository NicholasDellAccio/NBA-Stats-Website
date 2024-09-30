<!DOCTYPE html>
<?php 
include("connection.php");

if (isset($_POST['user']) && isset($_POST['name']) && isset($_POST['state']) && isset($_POST['pass']) )  {
    $username = $_POST['user'];
    $name = $_POST['name'];
    $state = $_POST['state'];
    $password = $_POST['pass'];
    $sql = "INSERT INTO user (username, name, state, password) 
            VALUES ('$username', '$name', '$state', '$password')";

    if (mysqli_query($conn, $sql)) {
        
        session_start();
        $_SESSION["username"] = $username;
        header("Location: homepage.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }


}
    ?>
<html>
    <head>
        <title>Sign Up Form</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "./main.css">
    </head>
    <body>
        <div class = "container">
            <form class = "form" action = "signup.php" id ="SignUp" onsubmit="return isvalid()" method="POST">
                <h1 class = "form__title">Sign up</h1>
                <div class = "msg"></div>
                <div class ="form__input-group">
                    <input type ="text"  id = "user" name = "user" class = "form__input" autofocus placeholder ="Username">
                </div>

                <div class ="form__input-group">
                    <input type ="text" id = "name" name = "name" class = "form__input" autofocus placeholder ="Name">
                </div>
                <div class ="form__input-group">
                    <input type ="text" id = "state" name = "state" class = "form__input" autofocus placeholder ="State">
                </div>
                <div class ="form__input-group">
                    <input type ="password" id = "pass" name = "pass" class = "form__input" autofocus placeholder ="Password">
                </div>
                <button class = "form__button" type ="submit">continue</button>
                <p class = "form__text">
                    <a class ="form__link" href = "./login.php" id = "linkLogin">Already have an Account? Login</a>
                </p>
            </form>
        </div>
        <script src = "signup.js"></script>
    </body>
</html>
