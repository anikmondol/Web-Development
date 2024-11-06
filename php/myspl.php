<?php

include("config/database.php");

## insert query 


// $date = date("Y-m-d H:i:s");

// $sql = "INSERT INTO `users`(`username`, `password`, `created_at`) VALUES ('anik mondal','321','$date')";

// $result = $conn->query($sql);

// if ($result === true) {
//     echo "new record created";
// } else {
//     echo "no record, error : ". $conn->error;
// }


## select query

// $sql = "SELECT * FROM `users` where id = 2";


// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         echo "<pre>";
//         print_r($row);
//     }
// } else {
//     echo "error";
// }


// update query

// $sql = "UPDATE `users` SET `username`='joy roy', `password`='741' WHERE id= 5";


// $result = $conn->query($sql);

// if ($result) {
//     echo "update successfully";
// } else {
//     echo "error";
// }


// delete query

// $spl = "DELETE FROM `users` WHERE id = 7";

// $result = $conn->query($spl);

// if($result){
//     echo "record delete";
// }else{
//     echo "error";
// }




?>