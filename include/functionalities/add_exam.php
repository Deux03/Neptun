<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['newExam'])) {
    $kod = $_POST['kód'];
    $idopont = $_POST['időpont'];
    $ferohely = $_POST['férőhely'];
    if($ferohely < 0 || $ferohely >= 1000) {
        $errorMessage = "A férőhelynek 0 és 1000 között kell lennie!";
        return;
    }
    $jelleg = $_POST['jelleg'];

    $sql = "INSERT INTO `vizsga` (`kód`, `időpont`, `férőhely`, `jelleg`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $kod, $idopont, $ferohely, $jelleg);
    try {
        if ($stmt->execute()) {
            header("Location: ./teachers_exams.php");
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

