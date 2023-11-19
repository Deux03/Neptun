<?php
session_start();
include_once("./include/config/config.php");
$conn = mysqli_connect($db_config['servername'], $db_config['username'], $db_config['password'], $db_config['dbname']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!mysqli_query($conn, 'SET NAMES UTF8')) {
    throw new Exception("Error setting character set: " . mysqli_error($conn));
}

if (!mysqli_query($conn, "SET character_set_results=utf8")) {
    throw new Exception("Error setting character set for results: " . mysqli_error($conn));
}

if (!mysqli_set_charset($conn, 'utf8')) {
    throw new Exception("Error setting character set with mysqli_set_charset: " . mysqli_error($conn));
}
