<?php
include_once("./include/db/mysql_connect.php");
$orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'kód';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$stm = $conn->prepare("SELECT * FROM terem ORDER BY `$orderBy` $order;");
$stm->execute();
$result = $stm->get_result();

if ($result->num_rows > 0) {
    echo "<h2>All of the classrooms</h2>";
    echo "<table><thead>";
    echo "<tr>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=cím&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Cím &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=emelet&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Emelet &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=ajtó&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Ajtó &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=név&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Név &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=férőhely&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Férőhely &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=jelleg&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Jelleg &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=kód&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Kód &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=időpont&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Időpont &#9650;&#9660;</th>";
    echo "</tr></thead>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><tbody>";
        echo "<td>" . $row["cím"] . "</td>";
        echo "<td>" . $row["emelet"] . "</td>";
        echo "<td>" . $row["ajtó"] . "</td>";
        echo "<td>" . $row["név"] . "</td>";
        echo "<td>" . $row["férőhely"] . "</td>";
        echo "<td>" . $row["jelleg"] . "</td>";
        echo "<td>" . $row["kód"] . "</td>";
        echo "<td>" . $row["időpont"] . "</td>";
        echo "</tr></tbody>";
    }

    echo "</table>";
} else {
    echo "<p>No classrooms not found.</p>";
}
$stm->close();
