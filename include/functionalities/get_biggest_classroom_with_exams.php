<?php
include_once("./include/db/mysql_connect.php");
$orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'terem_cim';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$stmt = $conn->prepare("SELECT t.cím AS terem_cim, t.emelet, t.ajtó, t.név, t.férőhely, t.jelleg,
                                k.kód AS kurzus_kod, k.`heti óraszám`AS heti_oraszám, k.jelleg AS kurzus_jelleg, k.cím AS kurzus_cim
                        FROM terem t
                        LEFT JOIN kurzus k ON t.kód = k.kód
                    WHERE t.férőhely = (SELECT MAX(férőhely) FROM terem WHERE kód IS NOT NULL)
                        ORDER BY $orderBy $order;");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h2>All of the courses and exams in the largest room</h2>";
    echo "<table><thead>";
    echo "<tr>";
    echo "<th>Terem cím</th>";
    echo "<th>Emelet</th>";
    echo "<th>Ajtó</th>";
    echo "<th>Név</th>";
    echo "<th>Férőhely</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=jelleg&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Jelleg  &#9650;&#9660;</th>";
    echo "<th>Kurzus kód</th>";
    echo "<th>Heti óraszám</th>";
    echo "<th>Kurzus jelleg</th>";
    echo "<th>Kurzus cím</th>";
    echo "</tr></thead>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><tbody>";
        echo "<td>" . $row["terem_cim"] . "</td>";
        echo "<td>" . $row["emelet"] . "</td>";
        echo "<td>" . $row["ajtó"] . "</td>";
        echo "<td>" . $row["név"] . "</td>";
        echo "<td>" . $row["férőhely"] . "</td>";
        echo "<td>" . $row["jelleg"] . "</td>";
        echo "<td>" . $row["kurzus_kod"] . "</td>";
        echo "<td>" . $row["heti_oraszám"] . "</td>";
        echo "<td>" . $row["kurzus_jelleg"] . "</td>";
        echo "<td>" . $row["kurzus_cim"] . "</td>";
        echo "</tr></tbody>";
    }

    echo "</table>";
} else {
    echo "<p>No courses or exams were found in the largest room.</p>";
}
$stmt->close();
?>
