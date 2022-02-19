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
        // email checker
        if(!isset($_REQUEST['email'])){
            echo $return->json(false, 'email is required');
            return ;
        }

        // password checker
        if(!isset($_REQUEST['password'])){
            echo $return->json(false, 'password is required');
            return ;
        }else{
            if( strlen($_REQUEST['password']) < 6 ){
                echo $return->json(false, 'password is invalid');
                return ;
            }
        }

        // currency checker
        if(!isset($_REQUEST['currency'])){
            echo $return->json(false, 'currency is required');
            return ;
        }

        // declare variable
        $email = strtolower($_REQUEST['email']);
        $password = sha1(strtolower($_REQUEST['password']));
        $currency = $_REQUEST['currency'];

        // check if email exist
        if((mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email = '$email'"))) > 0){
            echo $return->json(false, 'email already exist');
            return ;
        }

        // create account
        $sql = "INSERT INTO users(email, password, currency) VALUES('$email', '$password', '$currency')";
    } catch (\Throwable $th) {
        //throw $th;
        echo $return->json(false, $th->getMessage());
    }

?>