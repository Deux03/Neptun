<?php
include_once("./include/db/mysql_connect.php");
session_start();
$_SESSION = array();

if (session_destroy()) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );

    setcookie("username", "", time() - 3600, "/");
    setcookie("name", "", time() - 3600, "/");
    setcookie("isStudent", "", time() - 3600, "/");
    setcookie("LoggedIn", true, time() - 3600, "/");

    header("Location: ../../../neptun/index.php");
    exit();
} else {
    echo "Error destroying session";
}
