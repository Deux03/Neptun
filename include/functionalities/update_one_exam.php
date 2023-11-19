<?php
include_once("./include/db/mysql_connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editedExam'])) {
    $id = $_POST['id'];
    $ferohely = $_POST['ferohely'];
    $ido = $_POST['ido'];
    $jelleg = $_POST['jelleg'];

    $stmt = $conn->prepare("UPDATE `vizsga` SET `férőhely` = ?, `időpont` = ?, `jelleg` = ? WHERE `kód` = ?");
    $stmt->bind_param('iss', $ferohely, $ido, $jelleg, $id);
    if($stmt->execute()){
        header("Location: ./teachers_exams.php");
        $stmt->close();
        exit();
    } else {
        $errorMessage = "Sikertelen módosítás: " . $stmt->error;
    }
    $stmt->close();
}

