<?php
session_start();


/*
## database connection
mysqli extension - works only mysql database
pdo (php date object) - works with 12 different database
*/ 

$server_name = "localhost";
$user_name = "root";
$password = "";
$dbname = "phptutorial";

// create connection
 $conn = new mysqli($server_name, $user_name, $password, $dbname);

// check connection
if ($conn->connect_error) {
    echo "Connection failed ". $connect_error;
}


 




?>