<?php
include_once("./include/db/mysql_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['newCourse'])) {
    $kod = $_POST['kód'];
    $ferohely = $_POST['férőhely'];
    $hetoOraszam = $_POST['heti_óraszám'];
    if($hetoOraszam < 0 || $hetoOraszam >= 10) {
        $errorMessage = "A heti óraszámnak 0 és 10 között kell lennie!";
        return;
    }
    if($ferohely < 0 || $ferohely >= 1000) {
        $errorMessage = "A férőhelynek 0 és 1000 között kell lennie!";
        return;
    }
    $jelleg = $_POST['jelleg'];
    $cim = $_POST['cím'];

    $sql = "INSERT INTO `kurzus` (`kód`, `férőhely`, `heti óraszám`, `jelleg`, `cím`) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiss", $kod, $ferohely, $hetoOraszam, $jelleg, $cim);
    try {
        if ($stmt->execute()) {
            header("Location: ./teachers_courses.php");
            $stmt->close();
            exit();
        } else {
            $errorMessage = "Sikertelen hozzáadás: " . $stmt->error;
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            $errorMessage = "Duplicate entry. The provided 'kód' already exists.";
        } else {
            $errorMessage = "MySQL Error: " . $e->getMessage();
        }
    }
    $stmt->close();
}
