<?php
include_once("./mysql_connect.php");

$username = $password = $stmt = $result = $row = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        echo "Please enter both username and password.";
    } else {
        $stmt = $conn->prepare("SELECT * FROM `felhasználó` WHERE `felhasználó név`=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['jelszó'])) {
                echo "Welcome " . $row['név'] . " " . $row['születési hely'] . " " . $row['szak'] . "!";
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "Invalid username or password.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>

<body>
    <h1>Welcome ot the Neptun system</h1>
    <h2>Login Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>

</body>

</html>

<?php
include_once("./mysql_disconnect.php");
?>