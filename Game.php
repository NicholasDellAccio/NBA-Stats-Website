<?php

include("connection.php");


$search = "";


if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM game WHERE h_team ='$search' or a_team = '$search' ";
    if($search == "")
    {
        $sql = $sql = "SELECT * FROM game";
    }
}
else 
{
    $sql = "SELECT * FROM game";
}



$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel = "stylesheet" href = "./tables.css">
</head>
<body>
    <div class="container">
        <a href="homepage.php" class="link">Go to Homepage</a>
        <h2 class="mb-4">Game Data</h2>
        <form method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search for Teams..." value="<?php echo $search; ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Home Team</th>
                        <th>Away Team</th>
                        <th>Date</th>
                        <th>Home Score</th>
                        <th>Away Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        $ID = $row["g_id"];
                        $h_team = $row["h_team"];
                        $a_team =$row["a_team"];
                        $date = $row["g_date"];
                        $h_score= $row["hf_score"];
                        $a_score= $row["af_score"];

                        echo "<tr>
                                <td>$ID</td>
                                <td>$h_team</td>
                                <td>$a_team</td>
                                <td>$date</td>
                                <td>$h_score</td>
                                <td>$a_score</td>
                              </tr>";
                    }

                  
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
