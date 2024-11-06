<?php
/*
## $_GET, $_POST
php special / super global variables used to collect date from the html form, when date is sent to a file via action attribute in the <form> tag.

<form action="some_file.php" method="post">



*/ 

if (isset($_REQUEST["btn"])) {
//    $name = $_REQUEST["user_name"];
//    $password = $_REQUEST["user_password"];

//    echo($name);
//    echo($password);

// print_r($_REQUEST);

if (empty($_REQUEST["user_name"])) {
    echo "User name is empty";
    echo "<br>";
}elseif (empty($_REQUEST["user_password"])) {
    echo "User password is empty";
    echo "<br>";
} else {
    echo "All good";

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
    <form action="get_post_.php" method="post">
       <div>
            <label for="">User Name:</label>
            <input type="text" name="user_name">
       </div>
       <br>
       <div>
            <label for="">Password:</label>
            <input type="password" name="user_password">
       </div>
       <br>
       <div>
        <button type="submit" name="btn">submit</button>
       </div>
    </form>
    <br>
    <br>
    <a href="./get_post_.php">go page</a>
</body>
</html>