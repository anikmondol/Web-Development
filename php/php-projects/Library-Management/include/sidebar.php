<!-- offcanvas start -->
<div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <ul class="navbar-nav">
            <li class="nav-item">
                <div class="text-secondary small text-uppercase fw-bold">
                    Core
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= BASE_URL; ?>dashboard.php"><i
                        class="fa-solid fa-gauge me-2"></i>
                    Dashboard</a>
            </li>
            <li class="nav-item my-0">
                <hr>
            </li>
            <li class="nav-item">
                <div class="text-secondary small text-uppercase fw-bold">
                    Inventory
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center sidebar-link"
                    data-bs-toggle="collapse" href="#bookmanagement" role="button" aria-expanded="false"
                    aria-controls="bookmanagement">
                    <span><i class="fa-solid fa-book-open me-2"></i>Book's Management</span>
                    <span class="right-icon"><i class="fa-solid fa-chevron-down float-end"></i></span>
                </a>
                <div class="collapse" id="bookmanagement">
                    <div>
                        <ul class="navbar-nav ps-3">
                            <li class="font-size-sm"><a class="nav-link" href="<?= BASE_URL; ?>./books/add.php">
                                    <i class="fa-solid fa-plus me-2"></i> Add New</a></li>
                            <li class="font-size-sm"><a class="nav-link" href="<?= BASE_URL; ?>./books"><i
                                        class="fa-solid fa-list-check me-2"></i> Manage
                                    All</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center sidebar-link"
                    data-bs-toggle="collapse" href="#studentmanagement" role="button" aria-expanded="false"
                    aria-controls="studentmanagement">
                    <span><i class="fa-solid fa-user-group me-2"></i>Student's Management</span>
                    <span class="right-icon"><i class="fa-solid fa-chevron-down float-end"></i></span>
                </a>
                <div class="collapse" id="studentmanagement">
                    <div>
                        <ul class="navbar-nav ps-3">
                            <li class="font-size-sm"><a class="nav-link" href="<?= BASE_URL; ?>./students/add.php">
                                    <i class="fa-solid fa-plus me-2"></i> Add New</a></li>
                            <li class="font-size-sm"><a class="nav-link" href="<?= BASE_URL; ?>./students"><i
                                        class="fa-solid fa-list-check me-2"></i> Manage
                                    All</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item my-0">
                <hr>
            </li>
            <li class="nav-item">
                <div class="text-secondary small text-uppercase fw-bold">
                    BUSINESS
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center sidebar-link"
                    data-bs-toggle="collapse" href="#bookloan" role="button" aria-expanded="false"
                    aria-controls="bookloan">
                    <span><i class="fa-solid fa-book me-2"></i></i>Book's Loan</span>
                    <span class="right-icon"><i class="fa-solid fa-chevron-down float-end"></i></span>
                </a>
                <div class="collapse" id="bookloan">
                    <div>
                        <ul class="navbar-nav ps-3">
                            <li class="font-size-sm"><a class="nav-link" href="<?= BASE_URL; ?>./loans/add.php">
                                    <i class=" fa-solid fa-plus me-2"></i> Add New</a></li>
                            <li class="font-size-sm"><a class="nav-link" href="<?= BASE_URL; ?>./loans"><i
                                        class=" fa-solid fa-list-check me-2"></i> Manage
                                    All</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex justify-content-between align-items-center sidebar-link"
                    data-bs-toggle="collapse" href="#subscription" role="button" aria-expanded="false"
                    aria-controls="subscription">
                    <span><i class="fa-solid fa-indian-rupee-sign me-2"></i></i> Subscription's</span>
                    <span class="right-icon"><i class="fa-solid fa-chevron-down float-end"></i></span>
                </a>
                <div class="collapse" id="subscription">
                    <div>
                        <ul class="navbar-nav ps-3">
                            <li class="font-size-sm"><a class="nav-link" href="<?= BASE_URL; ?>subscriptions">
                                    <i class="fa-solid fa-plus me-2"></i>Plans</a></li>
                            <li class="font-size-sm"><a class="nav-link" href="<?= BASE_URL; ?>subscriptions/purchase-history.php"><i
                                        class="fa-solid fa-list-check me-2"></i>Purchase History</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav-item my-0">
                <hr>
            </li>
            <li class="nav-item">
                <div class="text-secondary small text-uppercase fw-bold">
                    Inventory
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= BASE_URL; ?>logout.php"><i
                        class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                    Logout</a>
            </li>
        </ul>
    </div>
</div>
<!-- offcanvas end -->