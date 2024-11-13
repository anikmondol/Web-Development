<?php

session_start();

if ($_SERVER["HTTP_HOST"] == "localhost") {
    define("BASE_URL", "http://localhost/Library-Management/");
    define("DIR_URL", $_SERVER["DOCUMENT_ROOT"] . "/Library-Management/");


    define("SERVER_NAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "library_management");

} else {
    define("BASE_URL", "https://Library-Management.com");
    define("DIR_URL", $_SERVER["DOCUMENT_ROOT"]);

    define("SERVER_NAME", "");
    define("USERNAME", "");
    define("PASSWORD", "");
    define("DATABASE", "");

}

?>