<?php

/* 

# if conditional statement
 if some condition is true, do something
 if conation is false, don't do it

## relational operator

> (greater than)
< (less than)
<= (greater than equal to)
>= (less than equal to)
== (equal to equal to)
! (not)


*/

// $age = 0;

// if ($age >= 18) {
//     echo "you can vote";
// }elseif($age === 0){
//     echo "invalid age";
// }
// else{
//     echo "you can not vote";
// }


$hours = 50; // 8 * 5 = 40
$rate = 10;
$weekPay = 0;

if($hours <= 0){
    $weekPay = 0;
}elseif ($hours <= 40) {
    $weekPay = $hours * $rate;
}else{
    $weekPay = (40 * $rate) + (($hours - 40) * ($rate * 1.5));
}


echo "You weekly payment is INR: $weekPay";


?>