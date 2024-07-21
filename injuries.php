<?php

include("connection.php");


$search = "";


if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM injuries WHERE name LIKE '%$search%' ";
    
}
else
{
    $sql = "SELECT * FROM injuries";
}



$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Injury Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel = "stylesheet" href = "./tables.css">
</head>
<body>
    <div class="container">
        <a href="homepage.php" class="link">Go to Homepage</a>
        <h2 class="mb-4">Injury Data</h2>
        <form method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search for Players..." value="<?php echo $search; ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Muscle</th>
                        <th>Date</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row["name"];
                        $pos= $row["pos"];
                        $muscle =$row["muscle"];
                        $date = $row["i_date"];
                        $desc= $row["i_desc"];
                        

                        echo "<tr>
                                <td>$name</td>
                                <td>$pos</td>
                                <td>$muscle</td>
                                <td>$date</td>
                                <td>$desc</td>
                              </tr>";
                    }

                  
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
