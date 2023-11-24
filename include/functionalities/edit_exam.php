<?php
include_once("./include/db/mysql_connect.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $ferohely = $_GET['ferohely'];
    $ido = $_GET['ido'];
    $jelleg = $_GET['jelleg'];

    echo "<form method='POST' action='#'>";
    echo "<input type='hidden' name='id' value='" . $id . "'>";
    echo "<label for='ferohely'>Férőhely:</label>";
    echo "<input type='number' name='ferohely' value='" . $ferohely . "'><br>";
    echo "<label for='ido'>Idő:</label>";
    echo "<input type='datetime-local' name='ido' value='" . $ido . "'><br>";
    echo "<label for='jelleg'>Jelleg:</label>";
    echo "<input type='text' name='jelleg' maxlength='20' value='" . $jelleg . "'><br>";
    echo "<input type='submit' name='editedExam' value='Update'>";
    echo "</form>";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editedExam'])) {
        $id = $_POST['id'];
        $ferohely = $_POST['ferohely'];
        if($ferohely < 0 || $ferohely >= 1000) {
            $errorMessage = "A férőhelynek 0 és 1000 között kell lennie!";
            return;
        }
        $ido = $_POST['ido'];
        $jelleg = $_POST['jelleg'];
    
        $stm = $conn->prepare("UPDATE `vizsga` SET `időpont` = ?, `férőhely` = ?, `jelleg` = ? WHERE `kód` = ?");
        $stm->bind_param('siss', $ido, $ferohely, $jelleg, $id);
        if($stm->execute()){
            header("Location: ./teachers_exams.php");
            $stm->close();
            exit();
        } else {
            $errorMessage = "Sikertelen módosítás: " . $stm->error;
        }
        $stm->close();
    }
}
