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
    if($isStudent == "Student"){
    echo "<th>Take exam</th>";
    }
    echo "</tr></thead><tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["időpont"] . "</td>";
        if($isStudent == "Student"){
            echo "<td><a href='./student_take_exam.php?id=" . $kod .
                "&idopont=" . urlencode($row['időpont']) . "'>Take exam</a></td>";
        }
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
