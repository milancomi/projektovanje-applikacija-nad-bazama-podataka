<?php

require  __DIR__ . '/../configuration.php';

$dbServername = DB_SERVER_NAME;
$dbUsername = DB_USER_NAME;
$dbPassword = DB_PASSWORD;
$dbName = DB_NAME;


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$sql = "select *from users";  
$users = mysqli_query($conn, $sql); 



?>