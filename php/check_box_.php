<?php

if (isset($_REQUEST["btn"])) {
   if (empty($_REQUEST["foods"])) {
    echo "selected at lest one item";
   } else {
    
    $foods = $_REQUEST["foods"];

    echo $foods[0];
    echo "<br>";

    foreach ($foods as $key => $value) {
        echo "you selected subjects ". $value;
        echo "<br>";
    }

   }
   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="check_box_.php" method="post">
    <label for="">Your Favorite Food</label>
         <div>
            <input type="checkbox" name="foods[]" id="" value='BCA'> BCA <br>
            <input type="checkbox" name="foods[]" id="" value='MCA'> MCA <br>
            <input type="checkbox" name="foods[]" id="" value='CSE'> CSE <br>
        </div>
        <button type="submit" name="btn" value="btn">submit</button>

    </form>
<br>
    <a href="./check_box_.php">home</a>
    </form>
</body>
</html>