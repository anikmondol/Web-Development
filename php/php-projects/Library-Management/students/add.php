<?php

include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/student.php");



// Add student functionality 

if (isset($_REQUEST["submit"])) {

    $res = create($conn, $_REQUEST);

    if (isset($res['success'])) {
        $_SESSION['success'] = "Student has been created successfully";
        header("LOCATION: " . BASE_URL . "students");
        exit;
    } else {
        $_SESSION['error'] = $res['error']; //"Something went wrong, please try again. ";
        header("LOCATION: " . BASE_URL . "students/add.php");
        exit;
    }
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
                    <h4 class="fw-bold text-uppercase">Add Student's</h4>
                    <?php include_once(DIR_URL . "include/alerts.php"); ?>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">File the form</h5>
                    <div class="card-body">
                        <form action="<?= BASE_URL ?>students/add.php" method="post">
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone No</label>
                                        <input type="text" class="form-control" name="phone_no" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" name="submit" class="btn btn-success">
                                        Save
                                    </button>

                                    <button type="reset" class="btn btn-secondary">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
        <!-- main content end -->

        <?php include_once(DIR_URL . "include/footer.php") ?>

    </main>

    <!-- main end -->


    <?php include_once(DIR_URL . "include/footer_end.php") ?>