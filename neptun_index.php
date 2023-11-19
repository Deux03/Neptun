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
    <title>Neptun</title>
    <link rel="stylesheet" href="./include/style/style.css">
</head>

<body>
<?php include_once("./navbar.php"); ?>
    <div class="content">
        <h1>Welcome into the Neptun system</h1>
        <?php
        echo "<p>Logged in as: " . $_COOKIE["username"] . "</p>";
        ?>
    </div>
</body>

</html>
<?php include_once("./include/db/mysql_disconnect.php"); ?>