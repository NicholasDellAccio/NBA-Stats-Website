<?php 
    $servername = "localhost";
    $cusername = "root";
    $password = "Dell1995";
    $db_name = "nba";  
    $conn = new mysqli($servername, $cusername, $password, $db_name);
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    echo " ";
    
    ?>