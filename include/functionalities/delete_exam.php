<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("UPDATE `vizsga` SET `időpont` = ?, `férőhely` = ?, `jelleg` = ? WHERE `kód` = ?");
    $stmt->bind_param('siss', $ido, $ferohely, $jelleg, $id);
    if ($stmt->execute()) {
        header("Location: ./teachers_exams.php");
        $stmt->close();
        exit();
    } else {
        $errorMessage = "Sikertelen módosítás: " . $stmt->error;
    }
    $stmt->close();

}