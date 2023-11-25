<?php
if (isset($_GET['exam_id'])){
include_once("./include/db/mysql_connect.php");

$kod = $_GET['exam_id'];
$stm = $conn->prepare("
    SELECT időpont FROM vizsga
    WHERE kód = ?
");
$stm->bind_param("s", $kod);
$stm->execute();

$result = $stm->get_result();
if ($result->num_rows > 0) {
    echo "<h2>Vizsgaidőpontok a '$kod' kurzushoz:</h2>";
    echo "<table><thead>";
    echo "<tr>";
    echo "<th>Vizsga időpontok</th>";
    echo "</tr></thead><tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["időpont"] . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>Nincs a vizsgához időpont</p>";
}

$stm->close();
} else {
    $errorMessage = "<p>Nem lett vizsga kiválasztva!</p>";
}
