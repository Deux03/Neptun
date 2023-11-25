<?php
include_once("./include/db/mysql_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['newCourse'])) {
    $kod = $_POST['kód'];
    $ferohely = $_POST['férőhely'];
    $hetoOraszam = $_POST['heti_óraszám'];
    if ($hetoOraszam < 0 || $hetoOraszam >= 10) {
        $errorMessage = "A heti óraszámnak 0 és 10 között kell lennie!";
        return;
    }
    if ($ferohely < 0 || $ferohely >= 1000) {
        $errorMessage = "A férőhelynek 0 és 1000 között kell lennie!";
        return;
    }
    $jelleg = $_POST['jelleg'];
    $cim = $_POST['cím'];
    $szemeszter = $_POST['szemeszter'];
    $sqlSzemeszter = "INSERT INTO `szemeszter` (`kód`, `szemeszter`) VALUES (?, ?)";
    $stmSzemeszter = $conn->prepare($sqlSzemeszter);
    $stmSzemeszter->bind_param("si", $kod, $szemeszter);
    $sqlKurzus = "INSERT INTO `kurzus` (`kód`, `férőhely`, `heti óraszám`, `jelleg`, `cím`) VALUES (?, ?, ?, ?, ?)";
    $stm = $conn->prepare($sqlKurzus);
    $stm->bind_param("siiss", $kod, $ferohely, $hetoOraszam, $jelleg, $cim);
    try {
        if ($stm->execute() && $stmSzemeszter->execute()) {
            header("Location: ./courses.php");
            $stmSzemeszter->close();
            $stm->close();
            exit();
        } else {
            $errorMessage = "Sikertelen hozzáadás kurzus: " . $stm->error . "és sikertekeb hozzáadás szemeszter: " . $stmSzemeszter->error;
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            $errorMessage = "Whit the provided 'kód' a course already exists.";
        } else {
            $errorMessage = "MySQL Error: " . $e->getMessage();
        }
    }
    $stm->close();
}
