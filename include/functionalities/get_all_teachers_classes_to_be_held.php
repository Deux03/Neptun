<?php
include_once("./include/db/mysql_connect.php");

$orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'vizsga.kód';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

$stm = $conn->prepare("
    SELECT
        o.`felhasználó név` AS oktato_neve,
        SUM(k.`heti óraszám`) AS heti_oraosszeg
    FROM oktat o
    JOIN kurzus k ON o.kód = k.kód
    GROUP BY o.`felhasználó név`;
");

$stm->execute();

$result = $stm->get_result();
if ($result->num_rows > 0) {
    echo "<table><thead>";
    echo "<tr>";
    echo "<th>Teacher</th>";
    echo "<th>Number of hours per week</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><tbody>";
        echo "<td>" . $row["oktato_neve"] . "</td>";
        echo "<td>" . $row["heti_oraosszeg"] . "</td>";
        echo "</tr></tbody>";
    }
    
    echo "</table>";
} else {
    echo "None is teaching!";
}

$stm->close();
?>
