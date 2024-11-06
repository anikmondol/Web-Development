<?php

session_start();

include("config/database.php");
include("config/tasks.php");


$obj = new Task();


if (isset($_REQUEST["submit"])) {

    // insert data in the table

    $task = $_REQUEST["task"];
    $id = $_POST["id"];
    $created_at = $update_at = date("Y-m-d H:i:s");


    // update
    if (!empty($id)) {
        $sql = "UPDATE `todo_lists` SET `task`='$task',`created_at`='$created_at',`update_at`='$update_at' WHERE id = $id";

        $res = $obj->executeQuery($sql);

        if ($res) {
            $_SESSION['success'] = "Task has been update successfully";
        } else {
            $_SESSION['error'] = "Something went wrong, please try again later";
        }
    }
    // insert
    else {
        $spl = "INSERT INTO `todo_lists`(`task`, `created_at`, `update_at`) VALUES ('$task','$created_at','$update_at')";

        $res = $obj->executeQuery($spl);

        if ($res) {
            $_SESSION['success'] = "Task has been created successfully";
        } else {
            $_SESSION['error'] = "Something went wrong, please try again later";
        }
    }




    session_write_close();
    header("LOCATION:index.php");
}


// get all tasks
$tasks =  $obj->getAllTasks();

// get task

$editing = false;
if (isset($_GET["action"]) && $_GET["action"] === "edit") {
    $taskDate = $obj->getTask($_GET["id"]);
    $editing = true;
}

// delete task

if (isset($_GET['action']) && $_GET["action"] === "delete") {
    $sql = "DELETE FROM `todo_lists` WHERE id = ". $_GET['id'];

    $res = $obj->executeQuery($sql);

    if ($res) {
        $_SESSION['success'] = "Task has been created successfully";
    } else {
        $_SESSION['error'] = "Something went wrong, please try again later";
    }

    session_write_close();
    header("LOCATION:index.php");

}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Todo List Project</title>

    <style>
        /*Step 1: CSS*/
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            background: #012d42;
        }

        .container {
            width: 40%;
            top: 50%;
            left: 50%;
            background: white;
            border-radius: 10px;
            min-width: 450px;
            position: absolute;
            min-height: 100px;
            transform: translate(-50%, -50%);
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        /*Step 2: CSS*/
        #newtask {
            position: relative;
            padding: 30px 20px;
        }

        #newtask h3 {
            margin-bottom: 20px;
        }

        #newtask input {
            width: 75%;
            height: 45px;
            padding: 12px;
            color: #111111;
            font-weight: 500;
            position: relative;
            border-radius: 5px;
            font-size: 15px;
            border: 2px solid #d1d3d4;
        }

        #newtask input:focus {
            outline: none;
            border-color: #0d75ec;
        }

        #newtask button {
            position: relative;
            float: right;
            font-weight: 500;
            font-size: 16px;
            background-color: #0d75ec;
            border: none;
            color: #ffffff;
            cursor: pointer;
            outline: none;
            width: 20%;
            height: 45px;
            border-radius: 5px;
        }

        /*Step 3: CSS*/
        #tasks {
            border-radius: 10px;
            width: 100%;
            position: relative;
            background-color: #ffffff;
            padding: 30px 20px;
            margin-top: 10px;
        }

        .task {
            border-radius: 5px;
            align-items: center;
            border: 1px solid #939697;
            cursor: pointer;
            background-color: #dadbdf;
            height: 50px;
            margin-bottom: 8px;
            padding: 5px 10px;
            line-height: 35px;
            /*justify-content: space-between;
  display: flex;*/
        }

        .task span {
            font-size: 15px;
            font-weight: 400;
        }

        .task .button {
            background-color: #db2525;
            color: #ffffff;
            border: none;
            cursor: pointer;
            outline: none;
            height: 100%;
            width: 40px;
            border-radius: 5px;
            float: right;
            margin-right: 5px;
            text-align: center;
        }

        .task .button.edit {
            background-color: #3d9afb;
        }

        /* Alert Messages  */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .alert .close {
            cursor: pointer;
            float: right;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            filter: alpha(opacity=20);
            opacity: 0.2;
            text-decoration: none !important;
            font-size: 18px;
            line-height: 1.2;
            position: relative;
            top: -2px;
            right: -10px;
            color: inherit;
        }
    </style>

</head>

<body>
    <!--Step 1: Basic structure of Todo List-->
    <div class="container">
        <!--Step 2: Create input place and button-->
        <div id="newtask">

            <?php include("include/alert.php") ?>


            <h3>Todo List Project</h3>
            <form action="index.php" method="post" id="taskform">
                <input type="hidden" name="id" value="<?php if ($editing) {
                                                            echo $taskDate["id"];
                                                        } ?>">
                <input type="text" name="task" id="anik" placeholder="Task to be done..." value="<?php if ($editing) {
                                                                                                    echo $taskDate["task"];
                                                                                                } ?>" />
                <button type="submit" name="submit" id="add"><?php if ($editing) {
                                                                    echo "Update";
                                                                } else {
                                                                    echo "Add";
                                                                } ?></button>
            </form>
        </div>

        <div id="tasks">
            <?php

            if (!empty($tasks)) {
                foreach ($tasks as $key => $value) {

            ?>

                    <div class="task">
                        <span><?= $value["task"] ?></span>
                        <a href="index.php?action=edit&id=<?= $value['id'] ?>" class="edit button"><i class="fa fa-edit"></i></a>
                        <a href="index.php?action=delete&id=<?= $value['id'] ?>" class="delete button"><i class="fa fa-trash-alt"></i></a>
                    </div>

            <?php }
            }; ?>

        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>

</html>