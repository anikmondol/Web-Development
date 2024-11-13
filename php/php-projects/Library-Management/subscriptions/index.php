<?php

include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/subscription.php");

// Add-edit  functionality 

if (isset($_REQUEST["submit"])) {

    if ($_REQUEST['id'] == '') {
       
    $res = create($conn, $_REQUEST);

    if (isset($res['success'])) {
        // create
        $_SESSION['success'] = "Plan loan has been created successfully";
        header("LOCATION: " . BASE_URL . "subscriptions");
        exit;
    } else {
        $_SESSION['error'] = $res['error']; //"Something went wrong, please try again. ";
        header("LOCATION: " . BASE_URL . "subscriptions");
        exit;
    }
    } else {
        // update
        $res = update($conn, $_REQUEST);

        if (isset($res['success'])) {
            $_SESSION['success'] = "Plan has been update successfully";
            header("LOCATION: " . BASE_URL . "subscriptions");
            exit;
        } else {
            $_SESSION['error'] = $res['error'];
            header("LOCATION: " . BASE_URL . "subscriptions");
            exit;
        }
    }
    

}


## get subscriptions

$plans = getPlans($conn);

## delete subscriptions

if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "delete") {
    $del  = delete($conn, $_REQUEST["id"]);

    if ($del) {
        $_SESSION["success"] = "Plan has been deleted successfully";
    } else {
        $_SESSION["error"] = "SomeThing went wrong";
    }

    header("LOCATION: " . BASE_URL . "subscriptions");
    exit;
}

## status updates of subscriptions

if (isset($_REQUEST["action"]) && $_REQUEST["action"] == "status") {
    $update  = updateStatus($conn, $_REQUEST["id"], $_REQUEST["status"]);

    if ($update) {

        if ($_REQUEST["status"] == 1) {
            $msg = "Subscriptions has been successfully activated";
        } else {
            $msg = "Subscriptions has been successfully deactivated";
        }

        $_SESSION["success"] = $msg;
    } else {
        $_SESSION["error"] = "SomeThing went wrong";
    }

    header("LOCATION: " . BASE_URL . "subscriptions");
    exit;
}

## status updates of subscriptions


if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit' && isset($_REQUEST['id']) && $_REQUEST['id'] > 0) {
    $plan = getPlanById($conn, $_REQUEST["id"]);
    if ($plan->num_rows > 0) {
        $plan = mysqli_fetch_assoc($plan);
    }
} else {
    $plan =  array('title' => '', 'amount' => '', 'duration' => '', 'id' => '');
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
            <div class="row ">
                <div class="col-md-12">
                    <h4 class="fw-bold text-uppercase">Subscriptions Plan</h4>
                    <?php include_once(DIR_URL . "include/alerts.php"); ?>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            All Plans
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-responsive table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($plans->num_rows > 0) {
                                            $i = 1;
                                            while ($row = $plans->fetch_assoc()) {

                                                $modalId = "centeredModal" . $row['id'];
                                        ?>
                                                <tr>
                                                    <th scope="row"><?= $i++ ?></th>
                                                    <td><?= $row['title']; ?></td>
                                                    <td>
                                                        <i class="fa-solid fa-indian-rupee-sign me-1"> <?= $row['amount']; ?>
                                                    </td>
                                                    <td><?= $row['duration']; ?> month</td>
                                                    <td><?php
                                                        if ($row["status"] == 1) {
                                                            echo '<span class="badge text-bg-success">Active</span>';
                                                        } else {
                                                            echo '<span class="badge text-bg-danger">Inactive</span>';
                                                        }
                                                        ?></td>
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
                                                                        <a href="<?= BASE_URL ?>subscriptions?action=edit&id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                                                        <a onclick="return confirm('Are you sure?');" href="<?= BASE_URL ?>subscriptions?action=delete&id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                                        <?php if ($row['status'] == 1) { ?>
                                                                            <a href="<?= BASE_URL ?>subscriptions?action=status&id=<?= $row["id"]; ?>&status=0" class="btn btn-warning btn-sm">Inactive</a>
                                                                        <?php } else { ?>
                                                                            <a href="<?= BASE_URL ?>subscriptions?action=status&id=<?= $row["id"]; ?>&status=1" class="btn btn-success btn-sm">Active</a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Add New Plan
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?= BASE_URL ?>subscriptions/index.php">
                                <input type="hidden" name="id" value="<?php echo $plan['id'] ?>" />
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Title</label>
                                            <input type="text" class="form-control" name="title" value="<?= $plan["title"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Amount</label>
                                            <input type="number" class="form-control" name="amount" value="<?= $plan["amount"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Duration</label>
                                            <select class="form-control" name="duration">
                                                <option value="">Please select</option>
                                                <?php
                                                for ($i = 1; $i < 7; $i++) {
                                                    $selected = "";
                                                    if ($i == $plan['duration'])
                                                        $selected = "selected";
                                                ?>
                                                    ?>
                                                    <option <?= $selected; ?> value="<?= $i; ?>"> <?= $i; ?> month(s)</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-success">
                                            Save
                                        </button>
                                        <?php if ($plan['id'] == '') {
                                        ?>
                                            <button type="reset" class="btn btn-secondary">
                                                Cancel
                                            </button>
                                        <?php } else { ?>
                                            <a href="<?= BASE_URL ?>subscriptions" type="reset" class="btn btn-secondary">
                                                Cancel
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- main content end -->

        <?php include_once(DIR_URL . "include/footer.php") ?>

    </main>

    <!-- main end -->


    <?php include_once(DIR_URL . "include/footer_end.php") ?>