<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "stock_system_db";

$connection = mysqli_connect($host,$user,$pass,$db_name);

if (!isset($connection)){
    die("DB connection failed!!!");
}
?>