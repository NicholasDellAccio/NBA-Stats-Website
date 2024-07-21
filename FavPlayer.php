<?php
session_start(); 

include("connection.php");

$username = $_SESSION['username'];

$search = "";


if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT p.p_name, p.position, p.age, p.points, p.rebounds, p.assists, p.team FROM player as p, favorite_Player as f WHERE f.u_player = p.p_name and p.p_name like '%$search%' and username = '$username'";
    if($search == "")
    {
        $sql = "SELECT p.p_name, p.position, p.age, p.points, p.rebounds, p.assists, p.team FROM player as p, favorite_Player as f WHERE f.u_player = p.p_name and username = '$username'";
    }
} else {
    $sql = "SELECT p.p_name, p.position, p.age, p.points, p.rebounds, p.assists, p.team FROM player as p, favorite_Player as f WHERE f.u_player = p.p_name and username = '$username'";
}

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite Players</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel = "stylesheet" href = "./tables.css">
</head>
<body>
    <div class="container">
        <a href="homepage.php" class="link">Go to Homepage</a>
        <h2 class="mb-4">Favorite Players</h2>
        <form method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search for players..." value="<?php echo htmlspecialchars($search); ?>">
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
                              </tr>";
                    }

                  
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
