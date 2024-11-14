<?php

/*

associative array - an array with key => value pair

*/ 

// $employees = array("software engineer", "web developer"); // index array


$employees = array("a" => "software engineer", 1 => "web developer"); // associative array

// echo "<pre>";
// print_r($employees);
// $keys = array_keys($employees);
// $values = array_values($employees);
// $employees = array_flip($employees);
// $employees = array_reverse($employees);
print_r($employees)


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php foreach ($employees as $key => $value) {
        # code...
     ?>

    <p><b> <?= ucwords($key) ?> : </b> <?= ucwords($value) ?> </p>
    <?php } ?>
</body>
</html>