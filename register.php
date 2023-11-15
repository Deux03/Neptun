<?php
include_once("./mysql_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>

<?php
$username = $status = $major = $birthdate = $birthplace = $password = $name = $isStudent = $sql = $stmt = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["felhasználó_név"];
    $status = $_POST["státusz"] == "active" ? 1 : 0;
    $major = $_POST["szak"];
    $birthdate = $_POST["születési_dátum"];
    $birthplace = $_POST["születési_hely"];
    $password = password_hash($_POST["jelszó"], PASSWORD_DEFAULT); 
    $name = $_POST["név"];
    $isStudent = ($_POST["hallgató"] == "teacher") ? 1 : 0;
    $sql = "INSERT INTO felhasználó (`felhasználó név`, `státusz`, `szak`, `születési dátum`, `jelszó`, `név`, `hallgató-e`, `születési hely`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissssis", $username, $status, $major, $birthdate, $password, $name, $isStudent, $birthplace);
    $stmt->execute();
    $stmt->close();
    echo "Registration successful!";
}
?>

<h2>Registration Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="felhasználó_név">Username:</label>
    <input type="text" id="felhasználó_név" name="felhasználó_név" required><br>

    <label for="státusz">Status:</label>
    <input list="status" id="státusz" name="státusz" required>
    <datalist id="status">
        <option value="active">
        <option value="passiv">
    </datalist><br><br>

    <label for="szak">Major:</label>
    <input type="text" id="szak" name="szak" required><br>

    <label for="születési_dátum">Birthdate:</label>
    <input type="date" id="születési_dátum" name="születési_dátum" required><br>

    <label for="születési_hely">Birthplace:</label>
    <input type="text" id="születési_hely" name="születési_hely" required><br>

    <label for="jelszó">Password:</label>
    <input type="password" id="jelszó" name="jelszó" required><br>

    <label for="név">Name:</label>
    <input type="text" id="név" name="név" required><br>

    <label for="hallgató">Role:</label>
    <input list="jogok" id="hallgató" name="hallgató" required>
    <datalist id="jogok">
        <option value="teacher">
        <option value="student">
    </datalist><br>

    <input type="submit" value="Register">
</form>

</body>
</html>

<?php
include_once("./mysql_disconnect.php");