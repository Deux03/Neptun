<?php
include_once("./include/db/mysql_connect.php");
$username = $password = $stmt = $result = $row = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        echo "Please enter both username and password.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM `felhasználó` WHERE `felhasználó név`=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['jelszó'])) {
                setcookie("username", $row['felhasználó név'], time() + (86400 * 30), "/"); // 30 days expiration
                setcookie("name", $row['név'], time() + (86400 * 30), "/");
                setcookie("isStudent", $row['hallgató-e'] == 1 ? 'Teacher' : 'Student', time() + (86400 * 30), "/");
                setcookie("LoggedIn", true, time() + (86400 * 30), "/");
                header("Location: ./neptun_index.php");
                exit();
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "Invalid username or password.";
        }
        $stmt->close();
    }
}
