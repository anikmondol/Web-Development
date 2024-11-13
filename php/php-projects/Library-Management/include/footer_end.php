<!-- footer end -->

<!-- App js -->
<script src="<?= BASE_URL; ?>assets/js/vendor.min.js"></script>
<scrip src="<?= BASE_URL; ?>assets/js/app.js"></script>

<!-- dataTables links -->
<script src="<?php echo BASE_URL ?>assets/js/jquery-3.5.1.js"></script>
<script src="<?php echo BASE_URL ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#data-table').DataTable({
            lengthMenu:[
                [7],[7]
            ],
            pageLength:7,
        });
    });
</script>

 <!-- script js file links -->
 <script src="<?php echo BASE_URL ?>assets/js/script.js"></script>

</body>



</html>