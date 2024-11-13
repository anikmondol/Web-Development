<?php

include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/loan.php");

## get loans
$loans = getLoans($conn);

## delete loans

if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "delete") {
    $del  = delete($conn, $_REQUEST["id"]);

    if ($del) {
        $_SESSION["success"] = "Books loan has been deleted successfully";
    } else {
        $_SESSION["error"] = "SomeThing went wrong";
    }

    header("LOCATION: " . BASE_URL . "loans");
    exit;
}

## status updates of loans

if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "is_return") {
    $update = $loans = updateStatus($conn, $_REQUEST["id"], $_REQUEST["is_return"]);

    if ($update) {

        if ($_REQUEST["is_return"] == 1) {
            $msg = "Books has been Returned successfully";
        } else {
            $msg = "Books has been successfully No Returned";
        }

        $_SESSION["success"] = $msg;
    } else {
        $_SESSION["error"] = "SomeThing went wrong";
    }

    header("LOCATION: " . BASE_URL . "loans");
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
                    <h4 class="fw-bold text-uppercase">Manage books loans</h4>
                    <?php include_once(DIR_URL . "include/alerts.php"); ?>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">All books loans</h5>
                    <div class="card-body">
                        <table id="data-table" class="table table-responsive table-striped" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Book Name</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Loan Date</th>
                                    <th scope="col">Return Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if ($loans->num_rows > 0) {
                                    $i = 1;
                                    while ($row = $loans->fetch_assoc()) {
                                        // Generate a unique modal ID using the loan's id or loop index
                                        $modalId = "centeredModal" . $row['id'];
                                ?>
                                        <tr>
                                            <th><?= $i++; ?></th>
                                            <td><?= $row["book_title"]; ?></td>
                                            <td><?= $row["student_name"]; ?></td>
                                            <td><?= date("d-m-Y", strtotime($row['loan_date'])) ?></td>
                                            <td><?= date("d-m-Y", strtotime($row['return_date'])) ?></td>
                                            <td><?php
                                                if ($row["is_return"] == 1) {
                                                    echo '<span class="badge text-bg-success">Returned</span>';
                                                } else {
                                                    echo '<span class="badge text-bg-warning">No Returned</span>';
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
                                                                <a href="<?= BASE_URL ?>loans/edit.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                                <a onclick="return confirm('Are you sure?');" href="<?= BASE_URL ?>loans?action=delete&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                                <?php if ($row['is_return'] == 0) { ?>
                                                                    <a href="<?= BASE_URL ?>loans?action=is_return&id=<?= $row["id"]; ?>&is_return=1" class="btn btn-success btn-sm">Returned</a>
                                                                <?php }?>
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