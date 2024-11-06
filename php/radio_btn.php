<?php

if (isset($_REQUEST["btn"])) {
   if (empty($_REQUEST['course'])) {
    echo "select at least one course";
   } else {
   $course = $_REQUEST['course'];
   echo $course;
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
    <form action="radio_btn.php" action="post">
        <label for="">select any course</label>
         <div>
            <input type="radio" name="course" id="" value='bca'> BCA <br>
            <input type="radio" name="course" id="" value='mca'> MCA <br>
            <input type="radio" name="course" id="" value='cse'> CSE <br>
        </div>
        <button type="submit" name="btn">submit</button>

    </form>
<br>
    <a href="./radio_btn.php">home</a>

</body>
</html>