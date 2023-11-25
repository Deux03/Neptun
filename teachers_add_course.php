<?php
if (!(isset($_COOKIE["LoggedIn"]) && $_COOKIE["LoggedIn"] == true)) {
    header("Location: ./index.php");
    exit();
}
include_once("./include/functionalities/add_course.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neptun</title>
    <link rel="stylesheet" href="./include/style/style.css">
</head>

<body>
    <?php include_once("./navbar.php"); ?>
    <div class="content">
        <h1>Add a new exam</h1>
        <form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
            <label for="kód">kód:</label>
            <input type="text" class="kód" name="kód" maxlength="20" required><br>

            <label for="férőhely">férőhely:</label>
            <input type="number" class="férőhely" name="férőhely" max="999" required><br>

            <label for="heti_óraszám">heti óraszám:</label>
            <input type="number" class="heti_óraszám" name="heti_óraszám" max="9" required><br>

            <label for="jelleg">jelleg:</label>
            <input type="text" class="jelleg" name="jelleg" maxlength="20" required><br>

            <label for="cím">cím:</label>
            <input type="text" class="cím" name="cím" maxlength="150" required><br>

            <label for="szemeszter">szemeszter:</label>
            <input type="number" class="szemeszter" name="szemeszter" min="0" max="9" required><br>

            <input class="button" type="submit" name="newCourse" value="Submit">
        </form>
        <?php
        if (!empty($errorMessage)) {
            echo "<p class='error-message'>$errorMessage</p>";
        }
        include_once("./include/functionalities/get_all_courses.php");
        ?>
    </div>
</body>

</html>
<?php include_once("./include/db/mysql_disconnect.php"); ?>