<?php
include_once("./include/db/mysql_connect.php");

if (isset($_GET['id']) && isset($_COOKIE["username"])) {
    $kod = $_GET['id'];
    $username = $_COOKIE["username"];
    $idopont = $_GET['idopont'];
    if (isset($_POST['confirmApplyExam'])) {
    $sql = "INSERT INTO `jelentkezik` (`felhasználó név` , `kód`, időpont) VALUES (?, ?, ?)";
    $stm = $conn->prepare($sql);
    $stm->bind_param("sss", $username, $kod, $idopont);
        try {
            if ($stm->execute()) {
                header("Location: ./exams.php");
                $stm->close();
                exit();
            } else {
                $errorMessage = "Couldn't take the exam: " . $stm->error;
            }
        } catch (mysqli_sql_exception $e) {
            $errorMessage = "MySQL Error: " . $e->getMessage();
        }

        $stm->close();
    }
    ?>
    <form method="post">
        <p class="question">Are you sure that you want to apply for this exam? (kód: <?php echo htmlspecialchars($kod . " at: " . $idopont); ?>)?</p>
        <input class="button" type="submit" name="confirmApplyExam" value="Yes">
        <button type="button" onclick="window.location.href='./exams.php'">Cancel</button>
    </form>
    <?php
} else {
    $errorMessage = "Missing parameter/s.";
}
?>
