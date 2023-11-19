<?php
include_once("./include/functionalities/register_handler.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="./include/style/style.css">
    
</head>

<body>

    <?php include_once("./navbar.php"); ?>
    <div class="content">
        <div id="register">
            <h2>Registration Form</h2>
            <div id="register-form">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="felhasználó_név">Username:</label>
                    <input type="text" class="felhasználó_név" name="felhasználó_név" maxlength="6" required><br>

                    <label for="státusz">Status:</label>
                    <input list="status" class="státusz" name="státusz" required>
                    <datalist class="status">
                        <option value="active">
                        <option value="passive">
                    </datalist><br><br>

                    <label for="szak">Major:</label>
                    <input type="text" class="szak" name="szak" maxlength="30" required><br>

                    <label for="születési_dátum">Birthdate:</label>
                    <input type="date" class="születési_dátum" name="születési_dátum" required><br>

                    <label for="születési_hely">Birthplace:</label>
                    <input type="text" class="születési_hely" name="születési_hely" maxlength="20" required><br>

                    <label for="jelszó">Password:</label>
                    <input type="password" class="jelszó" name="jelszó" maxlength="250" required><br>
         
                    <label for="jelszó2">Password again:</label>
                    <input type="password" class="jelszó2" name="jelszó2" maxlength="250" required><br>

                    <label for="név">Name:</label>
                    <input type="text" class="név" name="név" maxlength="40" required><br>

                    <label for="hallgató">Role:</label>
                    <input list="jogok" class="hallgató" name="hallgató" required>
                    <datalist class="jogok">
                        <option value="teacher">
                        <option value="student">
                    </datalist><br>

                    <input type="submit" value="Register">
                </form>
                <?php
                if (!empty($errorMessage)) {
                    echo "<p class='error-message'>$errorMessage</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php include_once("./include/db/mysql_disconnect.php"); ?>