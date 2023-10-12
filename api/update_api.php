<?php
    header("Access-Control-Allow-Methods: PUT");
    include("../config.php");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD']=="PUT"){

        $input = file_get_contents("php://input"); // string data

        parse_str($input,$_UPDATE);
        $id = $_UPDATE['id'];
        $name = $_UPDATE['name'];
        $post = $_UPDATE['post'];
        $salary = $_UPDATE['salary'];
       
        $res = $config->Update($id,$name,$post,$salary);

        if($res){
            $arr['data'] = "Record upadte succefully....";
            http_response_code(201);
        }else{
            $arr['data'] = "Record upadte unsuccefully....";
        }
    }else{
        $arr['error'] = "Only PUT Method are allowed...";
    }

    echo json_encode($arr);
?>