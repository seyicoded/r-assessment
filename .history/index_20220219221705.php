<?php 
    // just simple auth
    require './config/DB_CONNECTION.php';
    $config = new config();
    $con = $config->database();

    echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM users"));
?>