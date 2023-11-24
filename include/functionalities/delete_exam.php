<?php
include_once("./include/db/mysql_connect.php");

if (isset($_GET['id'])) {
    $kod = $_GET['id'];
    if (isset($_POST['confirmDelete'])) {
        $stm = $conn->prepare("DELETE FROM `vizsga` WHERE `kód` = ?");
        $stm->bind_param('s', $kod);

        try {
            if ($stm->execute()) {
                header("Location: ./exams.php");
                $stm->close();
                exit();
            } else {
                $errorMessage = "Sikertelen törlés: " . $stm->error;
            }
        } catch (mysqli_sql_exception $e) {
            $errorMessage = "MySQL Error: " . $e->getMessage();
        }

        $stm->close();
    }
    ?>
    <form method="post">
        <p>Are you sure that you want to delete this exam? (kód: <?php echo htmlspecialchars($kod); ?>)?</p>
        <input type="submit" name="confirmDelete" value="Yes">
        <button type="button" onclick="window.location.href='./exams.php'">Cancel</button>
    </form>
    <?php
} else {
    $errorMessage = "Missing 'kód(id)' parameter.";
}
?>
