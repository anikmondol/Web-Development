<?php

include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/student.php");



// update student functionality 

if (isset($_REQUEST["submit"])) {

    $res = update($conn, $_REQUEST);

    if (isset($res['success'])) {
        $_SESSION['success'] = "student has been update successfully";
        header("LOCATION: " . BASE_URL . "students");
        exit;
    } else {
        $_SESSION['error'] = $res['error'];
        header("LOCATION: " . BASE_URL . "students/edit.php");
        exit;
    }
}

// read get parameter to get student data

if (isset($_REQUEST["id"]) && $_REQUEST["id"] > 0) {
    $student = getStudentById($conn, $_REQUEST["id"]);
    if ($student->num_rows > 0) {
        $student = mysqli_fetch_assoc($student);
    }
} else {
    header("Location: " . BASE_URL . "students");
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
                    <h4 class="fw-bold text-uppercase">Edit Student</h4>
                    <?php include_once(DIR_URL . "include/alerts.php"); ?>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">File the form</h5>
                    <div class="card-body">
                        <form action="<?= BASE_URL ?>students/edit.php" method="post">
                            <input type="hidden" name="id" value="<?= $student["id"]; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" value="<?= $student["name"]; ?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?= $student["email"]; ?>" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone No</label>
                                        <input type="text" class="form-control" name="phone_no" value="<?= $student["phone_no"]; ?>" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" name="address" value="<?= $student["address"]; ?>" />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" name="submit" class="btn btn-success">
                                        Save
                                    </button>
                                    <a href="<?= BASE_URL ?>students" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
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