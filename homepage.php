<!DOCTYPE html>
<?php 

    ?>
<html>
    <head>
        <title> Homepage </title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "./homepage.css">
    </head>
    <body>
        <a class = "logout__link"  href = "./login.php">log out</a>
        <div class = "container">
            <form class = "form" action="homepage.php" id ="homepage" >
                <h1 class = "form__title"> NBA Stats</h1>
                <p class = "form__text">
                    <a class ="form__link" href = "./Player.php" id = "Player">Players</a>
                </p>
                <p class = "form__text">
                    <a class ="form__link" href = "./Team.php" id = "Team">Teams</a>
                </p>
                <p class = "form__text">
                    <a class ="form__link" href = "./Game.php" id = "Game">Games</a>
                </p>
                <p class = "form__text">
                    <a class ="form__link" href = "./injuries.php" id = "injuries">Injuries</a>
                </p>
                <p class = "form__text">
                    <a class ="form__link" href = "./FavPlayer.php" id = "FavPlayer">Favorite Players</a>
                </p>
                <p class = "form__text">
                    <a class ="form__link" href = "./FavTeam.php" id = "FavTeam">Favorite Teams</a>
                </p>
            </form>
        </div>
        
    </body>
</html>
