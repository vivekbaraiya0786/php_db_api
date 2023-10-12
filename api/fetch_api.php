<?php
    header("Access-Control-Allow-Methods: DELETE");
    include("../config.php");

    $config = new Config();

    if($_SERVER['REQUEST_METHOD']=="GET"){
        
     
        $res = $config->fetch_data();

        $my_all_data = [];

       while($record = mysqli_fetch_assoc($res)){
        array_push($my_all_data,$record);
       }
       $arr['data'] = $my_all_data;
    }else{
        $arr['error'] = "Only GEt HTTP method allowed...";
    }

    echo json_encode($arr);
?>