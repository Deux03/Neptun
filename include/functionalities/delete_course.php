<?php
include_once("./include/db/mysql_connect.php");

if (isset($_GET['id'])) {
    $kod = $_GET['id'];
    if (isset($_POST['confirmDelete'])) {
        $stm = $conn->prepare("DELETE FROM `kurzus` WHERE `kód` = ?");
        $stm->bind_param('s', $kod);

        try {
            if ($stm->execute()) {
                header("Location: ./courses.php");
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
        <p class="question">Are you sure that you want to delete this course? (kód: <?php echo htmlspecialchars($kod); ?>)?</p>
        <input class="button" type="submit" name="confirmDelete" value="Yes">
        <button type="button" onclick="window.location.href='./courses.php'">Cancel</button>
    </form>
    <?php
} else {
    $errorMessage = "Missing 'kód(id)' parameter.";
}
?>
