<?php
$username = $status = $major = $birthdate = $birthplace = $password = $name = $isStudent = $sql = $stmt = null;

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

            $sql = "INSERT INTO felhasználó (`felhasználó név`, `státusz`, `szak`, `születési dátum`, `jelszó`, `név`, `hallgató-e`, `születési hely`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sissssis", $username, $status, $major, $birthdate, $password, $name, $isStudent, $birthplace);

            if ($stmt->execute()) {
                $stmt->close();
                header("Location: ./index.php");
                exit();
            } else {
                $errorMessage = "Sikertelen regisztráció. Próbáld újra később.";
            }
            $stmt->close();
        }
    }
}

