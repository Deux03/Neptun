<?php
$orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'kód';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$stmt = $conn->prepare("SELECT * FROM kurzus ORDER BY `$orderBy` $order;");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h2>All of the courses</h2>";
    echo "<table><thead>";
    echo "<tr>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=kód&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Kód &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=férőhely&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Férőhely &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=heti óraszám&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Heti óraszám &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=jelleg&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Jelleg &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=cím&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Cím &#9650;&#9660;</th>";
    echo "</tr></thead>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><tbody>";
        echo "<td>" . $row["kód"] . "</td>";
        echo "<td>" . $row["férőhely"] . "</td>";
        echo "<td>" . $row["heti óraszám"] . "</td>";
        echo "<td>" . $row["jelleg"] . "</td>";
        echo "<td>" . $row["cím"] . "</td>";
        echo "</tr></tbody>";
    }

    echo "</table>";
} else {
    echo "<p>No courses found.</p>";
}
$stmt->close();
?>
