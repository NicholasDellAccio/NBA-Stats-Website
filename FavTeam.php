<?php
session_start(); 

include("connection.php");

$username = $_SESSION['username'];

$search = "";


if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT t.t_name, t.city, t.arena, t.coach, t.abberviation FROM team as t, favorite_team as f WHERE f.u_team = t.t_name and t.t_name = '$search' and username = '$username'";
    if($search == "")
    {
        $sql = "SELECT t.t_name, t.city, t.arena, t.coach, t.abberviation FROM team as t, favorite_team as f WHERE f.u_team = t.t_name and username = '$username'";
    }
} else {
    $sql = "SELECT t.t_name, t.city, t.arena, t.coach, t.abberviation FROM team as t, favorite_team as f WHERE f.u_team = t.t_name and username = '$username'";

}

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite Teams</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel = "stylesheet" href = "./tables.css">
</head>
<body>
    <div class="container">
        <a href="homepage.php" class="link">Go to Homepage</a>
        <h2 class="mb-4">Favorite Teams</h2>
        <form method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search for Teams..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>City</th>
                        <th>Arena</th>
                        <th>Coach</th>
                        <th>Abbrev</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row["t_name"];
                        $city = $row["city"];
                        $arena =$row["arena"];
                        $coach = $row["coach"];
                        $abbrev = $row["abberviation"];

                        echo "<tr>
                                <td>$name</td>
                                <td>$city</td>
                                <td>$arena</td>
                                <td>$coach</td>
                                <td>$abbrev</td>
                              </tr>";
                    }

                  
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
