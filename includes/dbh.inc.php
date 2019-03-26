<?php 

// Change these to fit your database 
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword  = "";
$dbName = "loginsystem";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);// Makes the connection to the database
