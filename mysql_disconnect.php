<?php
include_once("./config.php");
$conn = mysqli_connect($db_config['servername'], $db_config['username'], $db_config['password'], $db_config['dbname']);
mysqli_close($conn);
