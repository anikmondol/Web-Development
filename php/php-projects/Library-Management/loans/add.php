<?php

include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/loan.php");



// Add  functionality 

if (isset($_REQUEST["submit"])) {

    $res = create($conn, $_REQUEST);

    if (isset($res['success'])) {
        $_SESSION['success'] = "Books loan has been created successfully";
        header("LOCATION: " . BASE_URL . "loans");
        exit;
    } else {
        $_SESSION['error'] = $res['error']; //"Something went wrong, please try again. ";
        header("LOCATION: " . BASE_URL . "loans/add.php");
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
                    <h4 class="fw-bold text-uppercase">Add loan's</h4>
                    <?php include_once(DIR_URL . "include/alerts.php"); ?>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">File the form</h5>
                    <div class="card-body">
                        <form action="<?= BASE_URL ?>loans/add.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Select Book</label>
                                        <?php
                                        $books = getBooks($conn);
                                        ?>
                                        <select name="book_id" class="form-control">
                                            <option value="">Please select</option>
                                            <?php while ($row = $books->fetch_assoc()) { ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Select Student</label>
                                        <?php
                                        $students = getStudents($conn);
                                        ?>
                                        <select name="student_id" class="form-control">
                                            <option value="">Please select</option>
                                            <?php while ($row = $students->fetch_assoc()) { ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Loan Date</label>
                                        <input type="date" class="form-control" name="loan_date"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Return/Due Date</label>
                                        <input type="date" class="form-control" name="return_date"/>
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