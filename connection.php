<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "leave";

// connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// check
if (!$conn) {
    die("Error :" . mysqli_connect_error());
}
?>