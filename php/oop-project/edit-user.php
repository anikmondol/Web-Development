<?php
include_once("./config/database.php");
$obj = new Query();

// update date
if (isset($_REQUEST['submit'])) {


    $date = $_REQUEST;
    $id = $date['id'];

    unset($date["submit"]);
    unset($date["id"]);


    $Update_date = $obj->UpdateDate("oop_users", $date, 'id', $id);

    if ($Update_date) {
        $_SESSION['success'] = "User has been update successfully";
    } else {
        $_SESSION['error'] = "Something went wrong";
    }
    header("LOCATION: index.php");
    exit;
}


// get date by id

$user = array();

if (isset($_GET['id']) && $_GET['id'] > 0) {

    $id = $_GET['id'];

    $result = $obj->getDateById("oop_users", "*", 'id', $id);

    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
    }
} else {
    header("LOCATION: index.php");
    exit;
}

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
                    <h4 class="fw-bold text-uppercase">Edit User</h4>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Fill the form
                        </div>
                        <div class="card-body">
                            <form method="post" action="edit-user.php">
                                <input type="hidden" value="<?= $user['id'] ?>" name="id">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone No</label>
                                            <input type="text" class="form-control" name="phone" value="<?= $user['phone'] ?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-success">
                                            Save
                                        </button>

                                        <a href="./" class="btn btn-secondary">
                                            Back
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>