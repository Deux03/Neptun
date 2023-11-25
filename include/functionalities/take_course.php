<?php
include_once("./include/db/mysql_connect.php");

if (isset($_GET['id']) && isset($_COOKIE["username"])) {
    $kod = $_GET['id'];
    $username = $_COOKIE["username"];
    if (isset($_POST['confirmApplyCourse'])) {
    $sql = "INSERT INTO `hallgatja` (`felhasználó név` , `kód`) VALUES (?, ?)";
    $stm = $conn->prepare($sql);
    $stm->bind_param("ss", $username, $kod);
        try {
            if ($stm->execute()) {
                header("Location: ./courses.php");
                $stm->close();
                exit();
            } else {
                $errorMessage = "Couldn't take the course: " . $stm->error;
            }
        } catch (mysqli_sql_exception $e) {
            $errorMessage = "MySQL Error: " . $e->getMessage();
        }

        $stm->close();
    }
    ?>
    <form method="post">
        <p class="question">Are you sure that you want to apply for this course? (kód: <?php echo htmlspecialchars($kod); ?>)?</p>
        <input class="button" type="submit" name="confirmApplyCourse" value="Yes">
        <button type="button" onclick="window.location.href='./courses.php'">Cancel</button>
    </form>
    <?php
} else {
    $errorMessage = "Missing 'kód(id)' parameter.";
}
?>
