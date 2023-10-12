<?php
include("config.php");

$config = new Config();

$fetch_records = $config->fetch_data();

if(isset($_REQUEST['submit_btn'])){
    $id = $_GET['id'];
    $name = $_GET['name'];
    $post = $_GET['post'];
    $salary = $_GET['salary'];

    $res = $config->insert($id,$name,$post,$salary); //return bool
    if($res){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Record Inserted</strong> Record Inserted Successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        
    }else{
        echo "Record not Inserted...";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container pt-5">
        <div class="col-5">
            <form action="#" method ="GET">
                ID: <input class="form-control" type="number" name="id"><br/>
                NAME: <input class="form-control" type="text" name="name"><br/>
                POST: <input class="form-control" type="text" name="post"><br/>
                SALARY: <input class="form-control" type="text" name="salary"><br/>
                <button class="btn-primary" type="form-button danger" name="submit_btn">SUBMIT FORM</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>