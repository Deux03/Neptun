<?php
if (!(isset($_COOKIE["LoggedIn"]) && $_COOKIE["LoggedIn"] == true)) {
    header("Location: ./index.php");
    exit();
}
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
    <?php
        if ($isStudent == "Teacher") {
            echo '<h1>Add the exam</h1>';
            echo '<a href="./teachers_add_exmas.php">';
            echo '<button type="button">Add exam</button>';
            echo '</a>';
        } else if ($isStudent == "Student") {
        }
        if (!empty($errorMessage)) {
            echo "<p class='error-message'>$errorMessage</p>";
        }
        include_once("./include/functionalities/get_all_exams.php") ?>
    </div>
</body>

</html>
<?php include_once("./include/db/mysql_disconnect.php"); ?>