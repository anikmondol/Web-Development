<?php
/*
##array - "variable" which can hold more than value at a time

*/ 

$fruits = array("apple", "orange", "banana", "mango");

// print_r($fruits);
// echo $fruits[1];

// array_push($fruits, "anik");
// array_pop($fruits);
// array_shift($fruits);
// array_unshift($fruits, "coconut");
// $r_array = array_reverse($fruits);
// echo count($fruits);



foreach ($fruits as $key => $value) {
    echo $value;
    echo "<br>";
}

?>