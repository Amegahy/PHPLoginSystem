<?php 
 
/* Server details used to connect with DB
    MUST be changed on different servers */
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword  = "";
$dbName = "loginsystem";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); // Makes the connection to the database
