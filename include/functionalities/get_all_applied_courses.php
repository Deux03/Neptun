<?php
include_once("./include/db/mysql_connect.php");
$orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'felhasznalo_nev';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$stmt = $conn->prepare("SELECT `felhasználó név`AS felhasznalo_nev, COUNT(kód) AS kurzusok_szama
                        FROM hallgatja
                        GROUP BY felhasznalo_nev
                        ORDER BY $orderBy $order");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h2>Number of courses taken by students</h2>";
    echo "<table><thead>";
    echo "<tr>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=felhasznalo_nev&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Felhasználó név &#9650;&#9660;</th>";
    echo "<th>Kurzusok száma</th>";
    echo "</tr></thead>";

    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["felhasznalo_nev"] . "</td>";
        echo "<td>" . $row["kurzusok_szama"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>None applied for any of the courses.</p>";
}
$stmt->close();
?>
