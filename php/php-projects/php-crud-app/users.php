<?php



include("config/database.php");
include("middleware.php");

// delete user , if id is set

if (isset($_GET["delete_id"])) {
    $sql = "DELETE FROM `users` WHERE id=" . $_GET["delete_id"];

    $result = $conn->query($sql);

    if ($result === true) {
        $_SESSION["delete"] = "User has been delete";
        header("LOCATION: users.php");
        exit;
    } else {
        $_SESSION["error"] = "Something went wrong, Please try again";
        header("LOCATION: users.php");
        exit;
    }

   
}



## select query

$sql = "SELECT * FROM `users` order by id desc";


$result = $conn->query($sql);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/style.css" rel="stylesheet">
    <title>PHP CRUD Application</title>
</head>

<body>
    <section class="section">

        <?php include("include/alert.php"); ?>

        <h2>All Users</h2>

        <table id="users">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                ?>
                        <tr>
                            <td>
                                <?= $row['username'] ?>
                            </td>
                            <td>
                                <?= date("d-m-Y H:i A", strtotime($row['created_at']))  ?>
                            </td>
                            <td>
                                <a href="edit-user.php?id=<?= $row['id'] ?>" class="button edit">Edit</a>
                                <a href="users.php?delete_id=<?= $row['id'] ?>" class="button delete">Delete</a>
                            </td>
                        </tr>
                <?php }
                } else {
                    echo "<tr><td colspan='3' style='text-align: center;'>No date found</td></tr>";
                } ?>
            </tbody>
        </table>

        <div class="container" style="background-color:#f1f1f1">
            <a href="add-users.php" class="footerbtn">Add User</a>
            <a href="logout.php" class="footerbtn">Logout</a>
        </div>
    </section>

</body>

</html>