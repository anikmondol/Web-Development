<?php

include_once("config/config.php");
include_once("config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/dashboard.php");

// get counts date
$counts = getCounts($conn);

// get tabs date
$tabs = getTabsDate($conn);


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
                    <h4 class="fw-bold text-uppercase">Dashboard</h4>
                    <p>Statistics of the system</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h6 class="card-title text-muted text-uppercase fw-bold">Total Books</h6>
                            <h1><?= $counts["total_books"] ?></h1>
                            <a href="<?php echo BASE_URL ?>books" class="card-link text-decoration-none">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h6 class="card-title text-muted text-uppercase fw-bold">Total Students</h6>
                            <h1><?= $counts["total_students"] ?></h1>
                            <a href="<?php echo BASE_URL ?>students" class="card-link text-decoration-none">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h6 class="card-title text-muted text-uppercase fw-bold">Total Revenue</h6>
                            <h1> <i class="fa-solid fa-dollar-sign" style="font-size: 35px;"></i> <?= number_format($counts["total_amount"]); ?></h1>
                            <a href="<?php echo BASE_URL ?>subscriptions/purchase-history.php" class="card-link text-decoration-none">View More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <h6 class="card-title text-muted text-uppercase fw-bold">Total Books Loan</h6>
                            <h1><?= $counts["total_loans"] ?></h1>
                            <a href="<?php echo BASE_URL ?>loans" class="card-link text-decoration-none">View More</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tabs -->
            <div class="row mt-5 dashboard-tabs">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-uppercase" id="recent-students" data-bs-toggle="tab"
                                data-bs-target="#recent-students-pane" type="button" role="tab"
                                aria-controls="recent-students-pane" aria-selected="true">New Students</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-uppercase" id="recant-loans" data-bs-toggle="tab"
                                data-bs-target="#recant-loans-pane" type="button" role="tab"
                                aria-controls="recant-loans-pane" aria-selected="false">Recant Loans</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-uppercase" id="recant-subscriptions" data-bs-toggle="tab"
                                data-bs-target="#recant-subscriptions-pane" type="button" role="tab"
                                aria-controls="recant-subscriptions-pane" aria-selected="false">Recant
                                Subscriptions</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="recent-students-pane" role="tabpanel"
                            aria-labelledby="recent-students" tabindex="0">
                            <table class="table tabs-table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone no</th>
                                        <th scope="col">Registered On</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    <?php
                                    $i = 1;
                                    foreach ($tabs["students"] as $student) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $student['name'] ?></td>
                                            <td><?= $student['phone_no'] ?></td>
                                            <td><?= date("d-m-Y H:i: A", strtotime($student["created_at"])) ?></td>
                                            <td>
                                                <?php
                                                if ($student['status'] == 1) {
                                                    echo '<span class="badge text-bg-success">Active</span>';
                                                } else {
                                                    echo '<span class="badge text-bg-danger">Inactive</span>';
                                                }
                                                ?>
                                            </td>
                                        </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="recant-loans-pane" role="tabpanel" aria-labelledby="recant-loans"
                            tabindex="0">
                            <table class="table tabs-table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Book Name</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Loan Date</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($tabs["loans"] as $loan) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $loan["book_title"]; ?></td>
                                            <td><?= $loan["student_name"]; ?></td>
                                            <td><?= date("d-m-Y", strtotime($loan["loan_date"])) ?></td>
                                            <td><?= date("d-m-Y", strtotime($loan["return_date"])) ?></td>
                                            <td>
                                                <?php
                                                if ($loan['is_return'] == 1) {
                                                    echo '<span class="badge text-bg-success">Active</span>';
                                                } else {
                                                    echo '<span class="badge text-bg-danger">Inactive</span>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="recant-subscriptions-pane" role="tabpanel"
                            aria-labelledby="recant-subscriptions" tabindex="0">
                            <table class="table tabs-table">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Plan</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($tabs["subscriptions"] as $subscription) {
                                    ?>
                                        <tr>
                                            <th><?= $i; ?></th>
                                            <td><?= $subscription["student_name"]; ?></td>
                                            <td>
                                                        <span class="badge text-bg-info me-1"><?= $subscription["plan_name"]; ?></span>
                                                        <i class="fa-solid fa-indian-rupee-sign"></i>
                                                        <?= number_format($subscription["amount"]); ?>
                                                    </td>
                                            <td><?= date("d-m-Y", strtotime($subscription["start_date"])) ?></td>
                                            <td><?= date("d-m-Y", strtotime($subscription["start_date"])) ?></td>
                                            <td>
                                                <?php
                                                $today = date("Y-m-d");
                                                if ($subscription["end_date"] >= $today) {
                                                    # code...
                                                ?>
                                                    <span class="badge text-bg-success">Active</span>
                                                <?php } else { ?>
                                                    <span class="badge text-bg-danger">Expired</span>
                                                <?php } ?>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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