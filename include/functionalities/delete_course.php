<?php
include_once("./include/db/mysql_connect.php");

if (isset($_GET['id'])) {
    $kod = $_GET['id'];
    if (isset($_POST['confirmDelete'])) {
        $stmt = $conn->prepare("DELETE FROM `kurzus` WHERE `kód` = ?");
        $stmt->bind_param('s', $kod);

        try {
            if ($stmt->execute()) {
                header("Location: ./teachers_courses.php");
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
        <p>Are you sure that you want to delete this course? (kód: <?php echo htmlspecialchars($kod); ?>)?</p>
        <input type="submit" name="confirmDelete" value="Yes">
        <button type="button" onclick="window.location.href='./teachers_courses.php'">Cancel</button>
    </form>
    <?php
} else {
    $errorMessage = "Missing 'kód(id)' parameter.";
}
?>
