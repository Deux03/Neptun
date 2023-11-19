<?php
if(!(isset($_COOKIE["LoggedIn"]) && $_COOKIE["LoggedIn"] == true)) {
    header("Location: ./index.php");
    exit();
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./include/style/style.css">
</head>

<body>
<?php include_once("./navbar.php"); ?>
    <div class="content">
        <h3>Profil</h3>
        <?php
        include_once("./include/functionalities/get_profile.php");
        if(isset($_COOKIE["isStudent"]) && $_COOKIE["isStudent"] == "Teacher") {
            include_once("./include/functionalities/get_all_students.php");
            include_once("./include/functionalities/get_all_teachers.php");
        }
        ?>
    </div>
</body>

</html>
<?php include_once("./include/db/mysql_disconnect.php"); ?>