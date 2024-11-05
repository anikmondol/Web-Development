<?php
## while loop = repeat some code a certain period of time

// $num = 1;

// while ($num <= 10) {
//     echo $num;
//     $num++;
//     echo "<br>";
// }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        
    $num = 1;

while ($num <= 10) {

    ?>

    <h2>
        <?php echo $num;
        $num++;
        ?>
    </h2>

    <?php }?>

</body>
</html>