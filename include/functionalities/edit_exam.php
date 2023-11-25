<?php
include_once("./include/db/mysql_connect.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $ferohely = $_GET['ferohely'];
    $ido = $_GET['ido'];
    $jelleg = $_GET['jelleg'];
    echo "<p>Editing ($id)'s exam</p>";
    echo "<form method='POST' action='#'>";
    echo "<label for='ferohely'>Férőhely:</label>";
    echo "<input type='number' name='ferohely2' value='" . $ferohely . "'><br>";
    echo "<label for='ido'>Idő:</label>";
    echo "<input type='datetime-local' name='ido2' value='" . $ido . "'><br>";
    echo "<label for='jelleg'>Jelleg:</label>";
    echo "<input type='text' name='jelleg2' maxlength='20' value='" . $jelleg . "'><br>";
    echo "<input class='button' type='submit' name='editedExam' value='Update'>";
    echo "</form>";

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editedExam'])) {
        $ferohely2 = $_POST['ferohely2'];
        if ($ferohely2 < 0 || $ferohely2 >= 1000) {
            $errorMessage = "A férőhelynek 0 és 1000 között kell lennie!";
            return;
        }
        $ido2 = $_POST['ido2'];
        $jelleg2 = $_POST['jelleg2'];
        try {
            $stm = $conn->prepare("UPDATE `vizsga` SET `időpont` = ?, `férőhely` = ?, `jelleg` = ? WHERE `kód` = ? AND `időpont` = ?");
            $stm->bind_param('sisss', $ido2, $ferohely2, $jelleg2, $id, $ido);

            if ($stm->execute()) {
                header("Location: ./exams.php");
                $stm->close();
                exit();
            } else {
                
            }
        } catch (Exception $e) {
            $errorMessage = "There is an exam already with this time for this exam!:" . $e->getMessage();
        } finally {
            if (isset($stm)) {
                $stm->close();
            }
        }
    }
}