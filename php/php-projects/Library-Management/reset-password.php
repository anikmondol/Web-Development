<?php

include_once("config/config.php");
include_once("config/database.php");
include_once(DIR_URL . "models/auth.php");


if (isset($_SESSION["is_user_login"])) {
    header("LOCATION: " . BASE_URL . "dashboard.php");
    exit;
}


// reset password functionality 

if (isset($_REQUEST["submit"])) {

    $res = resetPassword($conn, $_REQUEST);


    if ($res["status"] == true) {
        $_SESSION['success'] = $res["message"];
        header("LOCATION: " . BASE_URL);
        exit;
    } else {
        $_SESSION['error'] = $res["message"];
        header("LOCATION: " . BASE_URL . "reset-password.php");
        exit;
    }
}


?>

<!DOCTYPE html>

<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />


<head>
    <meta charset="utf-8" />
    <title> Reset Password | Start Library Management System </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Anik Mondal" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/images/neptune.png">

    <link href="assets/libs/morris.js/morris.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="assets/js/config.js"></script>

    <!-- bootstrap css  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Custom style -->
    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body class="body-background">

    <!-- main content start -->
    <section class="container d-flex align-items-center justify-content-center vh-100">
        <div class="row">
            <div class="col-md-12 login-form">
                <div class="card mb-3" style="max-width: 900px;">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="assets/images/images/login-bg.jpg" class="img-fluid rounded-start h-100"
                                alt="Start Library Image Adding Son">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h1 class="card-title text-uppercase fw-bold">Start Library</h1>
                                <p class="card-text"> Reset Password</p>
                                <?php include_once(DIR_URL . "include/alerts.php"); ?>
                                <form action="<?= BASE_URL ?>reset-password.php" method="post">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Reset Password Code</label>
                                        <div>
                                            <input id="reset_code" type="password" class="form-control" name="reset_code">
                                            <span toggle="#reset_code" class="fa fa-fw fa-eye toggle-password me-2"
                                                onclick="togglePasswordVisibility('reset_code')"
                                                style="float: right; margin-left: -25px; margin-top: -25px; position: relative; z-index: 2;"></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <div>
                                            <input id="password-field" type="password" class="form-control" name="password">
                                            <span toggle="#password-field" class="fa fa-fw fa-eye toggle-password me-2"
                                                onclick="togglePasswordVisibility('password-field')"
                                                style="float: right; margin-left: -25px; margin-top: -25px; position: relative; z-index: 2;"></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <div>
                                            <input id="conf_pass" type="password" class="form-control" name="conf_pass">
                                            <span toggle="#conf_pass" class="fa fa-fw fa-eye toggle-password me-2"
                                                onclick="togglePasswordVisibility('conf_pass')"
                                                style="float: right; margin-left: -25px; margin-top: -25px; position: relative; z-index: 2;"></span>
                                        </div>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </form>
                                <hr>
                                <a href="./index.php" class="card-link text-decoration-none">Login?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- main content end -->


    <!-- App js -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- Knob charts js -->
    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!-- Sparkline Js-->
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <script src="assets/libs/morris.js/morris.min.js"></script>

    <script src="assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard init-->
    <script src="assets/js/pages/dashboard.js"></script>

    <!-- script js file links -->
    <script src="assets/js/script.js"></script>

</body>



</html>