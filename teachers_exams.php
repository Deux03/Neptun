<?php
if (!(isset($_COOKIE["LoggedIn"]) && $_COOKIE["LoggedIn"] == true)) {
    header("Location: ./index.php");
    exit();
}
include_once("./include/functionalities/mysql_connect.php");
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
        <h1>Add the exam</h1>
        <a href="./teachers_add_exmas.php">
            <button type="button">Add exam</button>
        </a>
        <?php include_once("./include/functionalities/get_all_exams.php") ?>
    </div>
</body>

</html>
<?php
include_once("./include/functionalities/mysql_disconnect.php");