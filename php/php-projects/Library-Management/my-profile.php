<?php

include_once("config/config.php");
include_once("config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/auth.php");
$user = $_SESSION["user"];



// change password functionality 

if (isset($_REQUEST["password_submit"])) {


    $res = changePassword($conn, $_REQUEST);


    if ($res["status"] == true) {
        $_SESSION['success'] = $res['message'];
        header("LOCATION: " . BASE_URL . "my-profile.php");
        exit;
    } else {
        $_SESSION['error'] = $res['message'];
        header("LOCATION: " . BASE_URL . "my-profile.php");
        exit;
    }
}

// profile update functionality 

if (isset($_REQUEST["profile_submit"])) {


    $res = updateProfile($conn, $_REQUEST);


    if ($res["status"] == true) {
        $_SESSION['success'] = $res['message'];
        header("LOCATION: " . BASE_URL . "my-profile.php");
        exit;
    } else {
        $_SESSION['error'] = $res['message'];
        header("LOCATION: " . BASE_URL . "my-profile.php");
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
                    <h4 class="fw-bold text-uppercase">My Profile</h4>
                    <?php include_once(DIR_URL . "include/alerts.php"); ?>
                </div>
                <!--Account info form-->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Account Information
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo BASE_URL ?>my-profile.php" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" name="name" value="<?= $user["name"] ?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" name="email" value="<?= $user["email"] ?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" name="phone_no" value="<?= $user["phone"] ?>" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3 position-relative extra">
                                            <label class="form-label">Profile Picture</label>
                                            <input type="file" class="form-control" name="profile_pic" />
                                            <?php if ($_SESSION['user']['profile_pic']) { ?>
                                                <img src="
                                                    <?php echo BASE_URL . 'assets/uploads/' . $_SESSION['user']['profile_pic'] ?>" style=" position: absolute; right: 0px; width: 38px; height: 38px; object-fit: cover; bottom: 0px; border-radius: 0px 6px 6px 0;" />
                                            <?php } else { ?>
                                                <img src="
                                                    <?php echo BASE_URL . 'assets/images/images/avatar-4.jpg' ?>" style=" position: absolute; right: 0px; width: 38px; height: 38px; object-fit: cover; bottom: 0px; border-radius: 0px 6px 6px 0;" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" name="profile_submit" class="btn btn-success">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--Change password form-->
                <div class="col-md-6">
                    <div class="card" style="min-height:457px;">
                        <div class="card-header">
                            <h4>Change Password</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo BASE_URL ?>my-profile.php">
                                <div class="row">

                                    <div class="form-group mb-3">
                                        <label class="form-label">Current Password</label>
                                        <div>
                                            <input id="reset_code" type="password" class="form-control" name="current_pass">
                                            <span toggle="#reset_code" class="fa fa-fw fa-eye toggle-password me-2"
                                                onclick="togglePasswordVisibility('reset_code')"
                                                style="float: right; margin-left: -25px; margin-top: -25px; position: relative; z-index: 2;"></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <div>
                                            <input id="password-field" type="password" class="form-control" name="new_pass">
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

                                    <div class="col-md-12">
                                        <button type="submit" name="password_submit" class="btn btn-success">
                                            Submit
                                        </button>
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