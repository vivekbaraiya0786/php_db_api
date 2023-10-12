
<?php
include("config.php");

$config = new Config();

$fetch_records = $config->fetch_data();

if (isset($_POST['dlt_btn'])) {
    $delete_id = $_POST['delete_id'];

    $res = $config->delete($delete_id);

    if ($res) {
        // Handle successful deletion, if needed
    }
}

if (isset($_POST['edit_btn'])) {
    $edit_id = $_POST['edit_id'];
    
    $fetch_single_data = $config->fetch_single_data($edit_id); 

    $single_record = mysqli_fetch_assoc($fetch_single_data);
}

if (isset($_POST['update_btn'])) {
    $update_id = $_POST['update_id'];
    $name = $_POST['name'];
    $post = $_POST['post'];
    $salary = $_POST['salary'];
    $config->Update($update_id, $name, $post, $salary);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6C...">
</head>
<body>
    <div class="container pt-5">
        <div class="col-5">
            <form action="" method="POST">
                <input type="hidden" name="update_id" value="<?php echo $single_record['id']; ?>">
                ID: <input class="form-control" type="number" name="id" value="<?php echo $single_record['id']; ?>"> <br/>
                NAME: <input class="form-control" type="text" name="name" value="<?php echo $single_record['name']; ?>"> <br/>
                POST: <input class="form-control" type="text" name="post" value="<?php echo $single_record['post']; ?>"> <br/>
                SALARY: <input class="form-control" type="number" name="salary" value="<?php echo $single_record['salary']; ?>"> <br/>
                <button type="submit" class="btn btn-danger" name="update_btn">Update</button>
            </form>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>POST</th>
                        <th>SALARY</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                  <?php while ($records = mysqli_fetch_assoc($fetch_records)) { ?>
                  <tr>
                    <td><?php echo $records['id']; ?></td>
                    <td><?php echo $records['name']; ?></td>
                    <td><?php echo $records['post']; ?></td>
                    <td><?php echo $records['salary']; ?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="delete_id" value="<?php echo $records['id']; ?>">
                            <button type="submit" class="btn btn-warning" name="dlt_btn">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="edit_id" value="<?php echo $records['id']; ?>">
                            <button type="submit" class="btn btn-danger" name="edit_btn">Edit</button>
                        </form>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDreTB..."></script>
</body>
</html>
