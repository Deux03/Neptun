<?php
include_once("./include/functionalities/login_handler.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insex page</title>
    <link rel="stylesheet" href="./include/style/style.css">
</head>

<body>
<?php include_once("./navbar.php");
    if (isset($_SESSION['registrationSuccess']) && $_SESSION['registrationSuccess']) {
        echo '<script>alert("Your registration was sucessful! You can log in now.");</script>';
        unset($_SESSION['registrationSuccess']);
    }
?>
    <div class="content">
        <h1>Log in to use Neptun</h1>
        <div id="login">
            <h2>Login Form</h2>
            <div id="login-form">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required><br>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required><br>

                    <input type="submit" value="Login">
                </form>
            </div>
            <div id="register_link">
                <form action="./register.php" method="get">
                    <button type="submit" class="button">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php include_once("./include/db/mysql_disconnect.php"); ?>