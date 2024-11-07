<?php

include("config/database.php");
include("middleware.php");


## step - 2 update user date, by form submit

if (isset($_REQUEST["submit"])) {
    extract($_POST);
   
    
$date = date("Y-m-d H:i:s");

//  $sql = "UPDATE `users` SET `username`='$username', `password`='$password' WHERE id= ". $_GET["id"];
 $sql = "UPDATE `users` SET `username`='$username' WHERE id= ". $_GET["id"];


$result = $conn->query($sql);

if ($result === true) {
    $_SESSION["success"] = "User has been updated";
} else {
    $_SESSION["error"] = "Something went wrong, Please try again";
}

header("LOCATION: users.php");

}

## step -1 get user's date, by user id

if (isset($_GET["id"])) {
     $sql = "SELECT * FROM `users` where id = " . $_GET['id'];

     $result = $conn->query($sql);

     $user = mysqli_fetch_assoc($result);

} else {
    echo "invalid request";
    exit;
}




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
        <h2>Edit User</h2>

        <form action="edit-user.php?id=<?= $_GET["id"] ?>" method="post">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required value="<?= $user['username'] ?>">

                <!-- <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required value="<?= $user['password'] ?>"> -->

                <button type="submit" name="submit">Update</button>

            </div>
        </form>
        <div class="container" style="background-color:#f1f1f1">
            <a href="users.php" class="footerbtn">All Users</a>
        </div>
    </section>

</body>

</html>