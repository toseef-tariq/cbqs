<?php

//MySQLi Procedural
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "cbqs";

// Configurasi Web Hosting
//$servername = "sql307.epizy.com";
//$username = "epiz_22297090";
//$password = "y6jeXp280TXg";
//$dbname = "epiz_22297090_db_web";




$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>