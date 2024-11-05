<?php

/*
## for loop = repeat some code a certain period of time

*/ 

// for ($i=1; $i <= 10; $i++) { 
//     echo $i;
//     echo "<br>";
// }


// for ($i=10; $i >= 1; $i--) { 
//     echo $i;
//     echo "<br>";
// }

$user_input = 2;

for ( $i = 1; $i <= 10; $i++) { 
    echo "$user_input X $i = ".  $user_input * $i;
    echo "<br>";
}


?>