<?php

require  __DIR__ . '/../configuration.php';

$dbServername = DB_SERVER_NAME;
$dbUsername = DB_USER_NAME;
$dbPassword = DB_PASSWORD;
$dbName = DB_NAME;

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


if (mysqli_connect_error()) { 
die("Database connection failed: " . 
mysqli_connect_error());
}

$create_table = "CREATE TABLE IF NOT EXISTS `users` 
(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30),
lastname VARCHAR(30),
password VARCHAR(30),
mail VARCHAR(30)

)";

$create_table2 = "CREATE TABLE IF NOT EXISTS `stories` 
(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id VARCHAR(30),
story_name varchar(30),
story_text varchar(255)
)";


$create_tbl = $conn->query($create_table);
$create_tbl2 = $conn->query($create_table2);

if ($create_table)
{
    echo "\nTable Created !" . PHP_EOL;
}
