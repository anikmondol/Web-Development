<?php

include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/student.php");

## get students
$students = getStudents($conn);

## delete students

if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "delete") {
    $del = delete($conn, $_REQUEST["id"]);

    if ($del) {
        $_SESSION["success"] = "Student has been deleted successfully";
    } else {
        $_SESSION["error"] = "SomeThing went wrong";
    }

    header("LOCATION: " . BASE_URL . "students");
    exit;
}

## status updates of students

if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "status") {
    $update = $students = updateStatus($conn, $_REQUEST["id"], $_REQUEST["status"]);

    if ($update) {

        if ($_REQUEST["status"] == 1) {
            $msg = "Student has been successfully activated";
        } else {
            $msg = "Student has been successfully deactivated";
        }

        $_SESSION["success"] = $msg;
    } else {
        $_SESSION["error"] = "SomeThing went wrong";
    }

    header("LOCATION: " . BASE_URL . "students");
    exit;
}

?>

<?php include_once(DIR_URL . "include/header.php"); ?>

<body>

    <!-- header start -->

    <header>

        <?php
        include_once(DIR_URL . "include/topbar.php");
        include_once(DIR_URL . "include/sidebar.php");
        ?>


    </header>

    <!-- header end -->

    <!-- main start -->

    <main class="mt-1 pt-3">

        <!-- main content start -->
        <section class="container-fluid">

            <!-- cards -->
            <div class="row">
                <div class="col-md-12">
                    <h4 class="fw-bold text-uppercase">Manage students</h4>
                    <?php include_once(DIR_URL . "include/alerts.php"); ?>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">All students</h5>
                    <div class="card-body">
                        <table id="data-table" class="table table-responsive table-striped" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Author Name</th>
                                    <th scope="col">categories Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if ($students->num_rows > 0) {
                                    $i = 1;
                                    while ($row = $students->fetch_assoc()) {
                                        // Generate a unique modal ID using the Student's id or loop index
                                        $modalId = "centeredModal" . $row['id'];
                                ?>
                                        <tr>
                                            <th><?= $i++; ?></th>
                                            <td><?= $row["name"]; ?></td>
                                            <td><?= $row["email"]; ?></td>
                                            <td><?= $row["phone_no"]; ?></td>
                                            <td><?php
                                                if ($row["status"] == 1) {
                                                    echo '<span class="badge text-bg-success">Active</span>';
                                                } else {
                                                    echo '<span class="badge text-bg-danger">Inactive</span>';
                                                }
                                                ?></td>
                                            <td><?= date("d-m-Y h:i A", strtotime($row["created_at"])); ?></td>
                                            <td class="text-center">
                                                <!-- Button trigger modal with dynamic modal ID -->
                                                <div class="btn border-0" data-bs-toggle="modal" data-bs-target="#<?= $modalId; ?>">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </div>

                                                <!-- Vertically centered modal with dynamic modal ID -->
                                                <div class="modal fade" id="<?= $modalId; ?>" tabindex="-1" aria-labelledby="<?= $modalId; ?>Label" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h6 class="modal-title" id="<?= $modalId; ?>Label">Edit / Delete</h6>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 10px;"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <a href="<?= BASE_URL ?>students/edit.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                                <a onclick="return confirm('Are you sure?');" href="<?= BASE_URL ?>students?action=delete&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                                <?php if ($row['status'] == 1) { ?>
                                                                    <a href="<?= BASE_URL ?>students?action=status&id=<?= $row["id"]; ?>&status=0" class="btn btn-warning btn-sm">Inactive</a>
                                                                <?php } else { ?>
                                                                    <a href="<?= BASE_URL ?>students?action=status&id=<?= $row["id"]; ?>&status=1" class="btn btn-success btn-sm">Active</a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- main content end -->

        <?php include_once(DIR_URL . "include/footer.php") ?>

    </main>

    <!-- main end -->


    <?php include_once(DIR_URL . "include/footer_end.php") ?>