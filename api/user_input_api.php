<?php
    header("Access-Control-Allow-Methods: POST");
    include("user_config.php");

    $config = new User_Config();

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $res = $config->user_insert($name,$email,$password);

        if($res){
            $arr['msg'] = "User Record inserted....";
            http_response_code(201);
        }else{
            $arr['msg'] = "User Record not inserted....";
        }
    }else{
        $arr['error'] = "Only POST Method are allowed...";
    }

    echo json_encode($arr);
?>