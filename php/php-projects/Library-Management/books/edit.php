<?php

include_once("../config/config.php");
include_once(DIR_URL . "config/database.php");
include_once(DIR_URL . "include/middleware.php");
include_once(DIR_URL . "models/book.php");



// update book functionality 

if (isset($_REQUEST["update"])) {

    $res = updateBook($conn, $_REQUEST);

    if (isset($res['success'])) {
        $_SESSION['success'] = "Book has been update successfully";
        header("LOCATION: " . BASE_URL . "books");
        exit;
    } else {
        $_SESSION['error'] = $res['error'];
        header("LOCATION: " . BASE_URL . "books/edit.php");
        exit;
    }
}

// read get parameter to get book data

if (isset($_REQUEST["id"]) && $_REQUEST["id"] > 0) {
    $book = getBookById($conn, $_REQUEST["id"]);
    if ($book->num_rows > 0) {
        $book = mysqli_fetch_assoc($book);
    }
} else {
    header("Location: " . BASE_URL . "books");
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
                    <h4 class="fw-bold text-uppercase">Edit Book's</h4>
                    <?php include_once(DIR_URL . "include/alerts.php"); ?>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">File the form</h5>
                    <div class="card-body">
                        <form action="<?= BASE_URL ?>books/edit.php" method="post">
                            <input type="hidden" name="id" value="<?= $book["id"]; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Book Title</label>
                                        <input name="title" type="text" class="form-control" value="<?= $book["title"] ?>" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">ISBN Number</label>
                                        <input name="isbn" type="text" class="form-control" value="<?= $book["isbn"] ?>" id="exampleInputPassword1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Author Name</label>
                                        <input name="author" type="text" class="form-control" value="<?= $book["author"] ?>" id="exampleInputPassword1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Publication Year</label>
                                        <input name="publication_year" type="number" class="form-control" value="<?= $book["publication_year"] ?>" id="exampleInputPassword1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Category</label>
                                        <?php
                                        $items = getCategories($conn);
                                        ?>
                                        <select name="category_id" id="" class="form-control">
                                            <option value="">Please Select</option>

                                            <?php
                                           
                                            while ($row = $items->fetch_assoc()) {
                                                if ($row["id"] === $book["category_id"]) {
                                                    $selected = "selected";
                                                }
                                            ?>
                                                <option <?= $selected; ?> value="<?= $row["id"]; ?>"><?= $row["name"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button name="update" type="submit" class="btn btn-success">Update</button>
                                    <a href="<?= BASE_URL ?>books" class="btn btn-secondary">Back</a>
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