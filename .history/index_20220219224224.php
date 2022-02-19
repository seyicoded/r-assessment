<?php 
    // just simple auth
    require './config/DB_CONNECTION.php';
    require './config/JSON.php';
    // configure database
    $config = new config();
    $con = $config->database();

    // configure response
    $return = new returns();

    try {
        //code...
        $num = mysqli_num_rows(mysqli_query($con, "SELECT * FROM users"));
        echo $return->json(true, 'connection successfully established', ['total users' => $num]);
        return ;
    } catch (\Throwable $th) {
        //throw $th;
        echo $return->json(true, 'an error occurred', ['error' => $th->getMessage()]);
        return ;
        
    }
?>