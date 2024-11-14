<?php

include_once("./config/database.php");
$obj = new Query();


// delete user

# Delete user
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    ## Delete Data
    $id = $_GET['id'];
    $delete_date = $obj->deleteDate("oop_users", 'id', $id);
    $_SESSION['success'] = "User has been deleted successfully";
    header("LOCATION: index.php");
    exit;
}



// get all date 
$users = $obj->getDate("oop_users", "*");



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />

    <script src="https://kit.fontawesome.com/1c26fb5c51.js" crossorigin="anonymous"></script>
    <title>CRUD Operations in OOP using PHP</title>
</head>

<body>
    <main class="mt-1 pt-3">
        <div class="container-fluid">
            <!--Cards-->
            <div class="row dashboard-counts">
                <div class="col-md-12">
                    <h4 class="fw-bold text-uppercase">Manage Users
                        <a href="add-user.php" class="btn btn-success btn-sm" style="float:right">Add User</a>
                    </h4>
                </div>

                <div class="col-md-12">
                    <?php include_once("alert.php") ?>
                    <div class="card mt-2">
                        <div class="card-header">
                            All Users
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone No</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $i = 1;

                                        if ($users->num_rows > 0) {

                                            while ($row = $users->fetch_assoc()) {

                                        ?>
                                                <tr>
                                                    <th scope="row"><?= $i++; ?></th>
                                                    <td><?= $row["name"]; ?></td>
                                                    <td><?= $row["email"]; ?></td>
                                                    <td><?= $row["phone"]; ?></td>
                                                    <td>
                                                        <a href="edit-user.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">
                                                            Edit
                                                        </a>
                                                        <a onclick="return confirm('Do you want to delete this?')" href="./?action=delete&id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>

                                            <?php   }
                                        } else { ?>

                                            <tr>
                                                <td class=" text-center" colspan="5">No record found</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>