<?php
if (!(isset($_COOKIE["LoggedIn"]) && $_COOKIE["LoggedIn"] == true)) {
    header("Location: ./index.php");
    exit();
}
include_once("./include/functionalities/mysql_connect.php");
include_once("./include/functionalities/add_exam.php");
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

            <label for="időpont">időpont:</label>
            <input type="datetime-local" class="időpont" name="időpont" required><br>

            <label for="férőhely">férőhely:</label>
            <input type="number" class="férőhely" name="férőhely" max="999" required><br>

            <label for="jelleg">jelleg:</label>
            <input type="text" class="jelleg" name="jelleg" maxlength="20" required><br>

            <input type="submit" name="newExam" value="Submit">
        </form>
        <?php
        include_once("./include/functionalities/get_all_exams.php");
        if (!empty($errorMessage)) {
            echo "<p class='error-message'>$errorMessage</p>";
        }
        ?>
    </div>
</body>

</html>
<?php
include_once("./include/functionalities/mysql_disconnect.php");