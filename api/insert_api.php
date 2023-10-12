<?php
    header("Access-Control-Allow-Methods: POST");
    include("../config.php");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $post = $_POST['post'];
        $salary = $_POST['salary'];

        $res = $config->insert($id,$name,$post,$salary);

        if($res){
            $arr['msg'] = "Record inserted....";
            http_response_code(201);
        }else{
            $arr['msg'] = "Record not inserted....";
        }
    }else{
        $arr['error'] = "Only POST Method are allowed...";
    }

    echo json_encode($arr);
?>