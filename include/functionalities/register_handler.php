<?php
include_once("./include/db/mysql_connect.php");
$username = $status = $major = $birthdate = $birthplace = $password = $name = $isStudent = $sqlKurzus = $stm = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["jelszó"] != $_POST["jelszó2"]) {
        $errorMessage = "A két jelszó nem egyezik meg!";
    } else {
        $username = $_POST["felhasználó_név"];

        $checkQuery = "SELECT COUNT(*) FROM felhasználó WHERE `felhasználó név` = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $username);
        $checkStmt->execute();
        $checkStmt->bind_result($count);
        $checkStmt->fetch();
        $checkStmt->close();

        if ($count > 0) {
            $errorMessage = "Sikertelen regisztráció. A felhasználónév már foglalt.";
        } else {
            $status = $_POST["státusz"] == "active" ? 1 : 0;
            $major = $_POST["szak"];
            $birthdate = $_POST["születési_dátum"];
            $birthplace = $_POST["születési_hely"];
            $password = password_hash($_POST["jelszó"], PASSWORD_DEFAULT);
            $name = $_POST["név"];
            $isStudent = ($_POST["hallgató"] == "teacher") ? 1 : 0;

            $sqlKurzus = "INSERT INTO felhasználó (`felhasználó név`, `státusz`, `szak`, `születési dátum`, `jelszó`, `név`, `hallgató-e`, `születési hely`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stm = $conn->prepare($sqlKurzus);
            $stm->bind_param("sissssis", $username, $status, $major, $birthdate, $password, $name, $isStudent, $birthplace);

            if ($stm->execute()) {
                $stm->close();
                $_SESSION['registrationSuccess'] = true;
                header("Location: ./index.php");
                exit();
            } else {
                $errorMessage = "Sikertelen regisztráció. Próbáld újra később.";
            }
            $stm->close();
        }
    }
}

