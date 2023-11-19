<?php
include_once("./include/db/mysql_connect.php");

if (isset($_GET['id'])) {
    $kod = $_GET['id'];
    if (isset($_POST['confirmDelete'])) {
        $stmt = $conn->prepare("DELETE FROM `vizsga` WHERE `kód` = ?");
        $stmt->bind_param('s', $kod);

        try {
            if ($stmt->execute()) {
                header("Location: ./teachers_exams.php");
                $stmt->close();
                exit();
            } else {
                $errorMessage = "Sikertelen törlés: " . $stmt->error;
            }
        } catch (mysqli_sql_exception $e) {
            $errorMessage = "MySQL Error: " . $e->getMessage();
        }

        $stmt->close();
    }
    ?>
    <form method="post">
        <p>Are you sure that you want to delete this exam? (kód: <?php echo htmlspecialchars($kod); ?>)?</p>
        <input type="submit" name="confirmDelete" value="Yes">
        <button type="button" onclick="window.location.href='./teachers_exams.php'">Cancel</button>
    </form>
    <?php
} else {
    $errorMessage = "Missing 'kód(id)' parameter.";
}
?>
