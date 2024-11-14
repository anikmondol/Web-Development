<?php
/*
## multidimensional array - Array inside array

*/ 


$student = array(
    array("name" => "anik", "class" => "bca"),
    array("name" => "joy", "class" => "hsc"),
    array("name" => "apu", "class" => "cse")
);

// echo "<pre>";
// print_r($student);


foreach ($student as $key => $values) {
   foreach ($values as $key => $value) {
    // echo $value;
    echo "<b>". ucwords($key) ."</b> : ". ucwords($value) . "<br>";
   }
}


?>