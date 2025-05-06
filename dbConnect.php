<?php

$hostname = 'localhost';

$username = 'root';

$password = '';

$database = 'deploy_resit';
$conn = mysqli_connect($hostname,  $username,  $password, $database) or die('Connecting to MySQL failed');
$dsn = "mysql:host=$hostname;dbname=$database;charset=utf8mb4";

//echo 'database connected';
?>

