<?php
include_once("./include/db/mysql_connect.php");
$username = isset($_COOKIE["username"]) ? $_COOKIE["username"] : null;
$name = isset($_COOKIE["name"]) ? $_COOKIE["name"] : null;
$isStudent = isset($_COOKIE["isStudent"]) ? $_COOKIE["isStudent"] : null;
$stm = $conn->prepare("SELECT `státusz`, `szak`, `születési dátum`, `születési hely` FROM `felhasználó` WHERE `felhasználó név`=?");
$stm->bind_param("s", $username);
$stm->execute();
$result = $stm->get_result();
if ($result->num_rows > 0) {
    echo "<div class='profile-table-container'>";
    echo "<table>";
    echo "<thead>";
    echo "<tr><th>Username</th><th>Name</th><th>isStudent</th><th>Status</th><th>Szak</th><th>Születési Dátum</th><th>Születési Hely</th></tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($username) . "</td><td>" . htmlspecialchars($name) . "</td><td>" . htmlspecialchars($isStudent) . "</td>" .
            "<td>" . htmlspecialchars($row["státusz"] == 1 ? "aktív" : "passzív") . "</td>" .
            "<td>" . htmlspecialchars($row["szak"]) . "</td>" .
            "<td>" . htmlspecialchars($row["születési dátum"]) . "</td>" .
            "<td>" . htmlspecialchars($row["születési hely"]) . "</td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "</div>";
} else {
    echo "0 results";
}
$stm->close();

