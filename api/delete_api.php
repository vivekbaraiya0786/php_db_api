<?php
    header("Access-Control-Allow-Methods: DELETE");
    include("../config.php");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD']=="DELETE"){
        
      $input =   file_get_contents("php://input");
        parse_str($input,$_DELETE);
        $id = $_DELETE['id'];
        $res = $config->delete($id);

        if($res){
            $arr['msg'] = "Record Delete scessfully....";
        
        }else{
            $arr['msg'] = "Record deleted failed....";
        }
    }else{
        $arr['error'] = "Only DELETE HTTP method allowed...";
    }

    echo json_encode($arr);
?>