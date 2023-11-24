<?php
include_once("./include/db/mysql_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['newExam'])) {
    $kod = $_POST['kód'];
    $idopont = $_POST['időpont'];
    $ferohely = $_POST['férőhely'];
    if($ferohely < 0 || $ferohely >= 1000) {
        $errorMessage = "A férőhelynek 0 és 1000 között kell lennie!";
        return;
    }
    $jelleg = $_POST['jelleg'];

    $sqlKurzus = "INSERT INTO `vizsga` (`kód`, `időpont`, `férőhely`, `jelleg`) VALUES (?, ?, ?, ?)";
    $stm = $conn->prepare($sqlKurzus);
    $stm->bind_param("ssis", $kod, $idopont, $ferohely, $jelleg);
    try {
        if ($stm->execute()) {
            header("Location: ./teachers_exams.php");
            $stm->close();
            exit();
        } else {
            $errorMessage = "Sikertelen hozzáadás: " . $stm->error;
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            $errorMessage = "Duplicate entry. The provided 'kód' already exists.";
        } else {
            $errorMessage = "MySQL Error: " . $e->getMessage();
        }
    }
    $stm->close();
}
