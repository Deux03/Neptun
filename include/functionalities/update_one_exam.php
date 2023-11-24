<?php
include_once("./include/db/mysql_connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editedExam'])) {
    $id = $_POST['id'];
    $ferohely = $_POST['ferohely'];
    $ido = $_POST['ido'];
    $jelleg = $_POST['jelleg'];

    $stm = $conn->prepare("UPDATE `vizsga` SET `férőhely` = ?, `időpont` = ?, `jelleg` = ? WHERE `kód` = ?");
    $stm->bind_param('iss', $ferohely, $ido, $jelleg, $id);
    if($stm->execute()){
        header("Location: ./teachers_exams.php");
        $stm->close();
        exit();
    } else {
        $errorMessage = "Sikertelen módosítás: " . $stm->error;
    }
    $stm->close();
}

