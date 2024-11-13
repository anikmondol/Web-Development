


<?php if (isset($_SESSION['success'])) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="mdi mdi-grease-pencil me-2"></i> <strong>Great!</strong>
    <?= $_SESSION["success"]; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php unset($_SESSION['success']);
} ?>

<?php if (isset($_SESSION['error'])) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Oops!</strong> <?php echo $_SESSION['error'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['error']);
} ?>