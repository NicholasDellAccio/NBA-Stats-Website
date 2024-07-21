<?php
session_start(); 

include("connection.php");

$username = $_SESSION['username'];

$search = "";


if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM player WHERE p_name LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM player";
}

$result = mysqli_query($conn, $sql);



if (isset($_POST['addToFavorites'])) {
    $player = $_POST['player'];
    $position = $_POST['position'];

    $insertSql = "INSERT INTO favorite_player (username, u_player, pos) VALUES ('$username', '$player', '$position')";
    $insertResult = mysqli_query($conn, $insertSql);

    if ($insertResult) {
        header("Location: Player.php");
    } else {
        echo "Failed to add to favorites.";
    }
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Player Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel = "stylesheet" href = "./tables.css">
</head>
<body>
    <div class="container">
        <a href="homepage.php" class="link">Go to Homepage</a>
        <h2 class="mb-4">Player Data</h2>
        <form method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search for players..." value="<?php echo $search; ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Age</th>
                        <th>Points</th>
                        <th>Rebounds</th>
                        <th>Assists</th>
                        <th>Team</th>
                        <th>Favorite</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row["p_name"];
                        $position = $row["position"];
                        $age =$row["age"];
                        $points = $row["points"];
                        $rebounds = $row["rebounds"];
                        $assists = $row["assists"];
                        $team = $row["team"];

                        echo "<tr>
                                <td>$name</td>
                                <td>$position</td>
                                <td>$age</td>
                                <td>$points</td>
                                <td>$rebounds</td>
                                <td>$assists</td>
                                <td>$team</td>
                                <td>
                                    <form method='post'>
                                        <input type='hidden' name='player' value='$name'>
                                        <input type='hidden' name='position' value='$position'>
                                        <button type='submit' name='addToFavorites' class='btn btn-danger'><i class='fas fa-heart'></i></button>
                                    </form>
                                </td>
                              </tr>";
                    }

                  
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
