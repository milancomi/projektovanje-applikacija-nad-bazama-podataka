<?php

require  __DIR__ . '/../configuration.php';

$dbServername = DB_SERVER_NAME;
$dbUsername = DB_USER_NAME;
$dbPassword = DB_PASSWORD;
$dbName = DB_NAME;


$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

$sql = "select * from users INNER JOIN stories ON users.id = stories.user_id ORDER BY stories.id DESC";   
$posts = mysqli_query($conn, $sql); 


?>