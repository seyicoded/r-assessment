<?php
    require '../config/DB_CONNECTION.php';
    require '../config/JSON.php';
    require '../config/AUTH_TOKEN.php';

    // configure database
    $config = new config();
    $con = $config->database();

    // configure response
    $return = new returns();

    // configure auth
    $auth = new auth_token();

    // verify if user is authorized to access route
    if(!($auth->verify())){
        echo $return->json(false, 'authorization code is invalid');
        return ;
    }

    // validate for input entry
    try {
        //code...
    } catch (\Throwable $th) {
        //throw $th;
        echo $return->json(false, $th->getMessage());
    }

?>