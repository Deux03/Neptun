<?php
include_once("./include/db/mysql_connect.php");
$orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'felhasználó név';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$stm = $conn->prepare("SELECT * FROM `felhasználó` WHERE `hallgató-e`='0'  ORDER BY `$orderBy` $order;");
$stm->execute();
$result = $stm->get_result();

if ($result->num_rows > 0) {
    echo "<h2>All of the students</h2>";
    echo "<table><thead>";
    echo "<tr>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=felhasználó név&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">felhasználó név &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=név&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">név &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=státusz&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">státusz &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=szak&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">szak &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=születési dátum&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">születési dátum &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=születési hely&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">születési hely &#9650;&#9660;</th>";
    echo "</tr></thead>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><tbody>";
        echo "<td>" . $row["felhasználó név"] . "</td>";
        echo "<td>" . $row["név"] . "</td>";
        echo "<td>" . htmlspecialchars($row["státusz"] == 1 ? "aktív" : "passzív") . "</td>";
        echo "<td>" . $row["szak"] . "</td>";
        echo "<td>" . $row["születési dátum"] . "</td>";
        echo "<td>" . $row["születési hely"] . "</td>";
        echo "</tr></tbody>";
    }

    echo "</table>";
} else {
    echo "<p>No students were found.</p>";
}
$stm->close();
