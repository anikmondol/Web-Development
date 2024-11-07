<?php
if (isset($_SESSION['is_user_logging'])) {
    return true;
} else {
    header("LOCATION: index.php");
}