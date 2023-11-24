<?php
include_once("./include/db/mysql_connect.php");
$orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'kód';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$stmt = $conn->prepare("SELECT kurzus.*, szemeszter.szemeszter FROM kurzus LEFT JOIN szemeszter ON kurzus.kód = szemeszter.kód ORDER BY kurzus.`$orderBy` $order;");
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
    echo "<th>Szemeszter</th>";
    if($isStudent == "Teacher"){
        echo "<th>Delete</th>";
    } else if ($isStudent == "Student"){
        echo "<th>Apply</th>";
    }
    echo "</tr></thead>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><tbody>";
        echo "<td>" . $row["kód"] . "</td>";
        echo "<td>" . $row["férőhely"] . "</td>";
        echo "<td>" . $row["heti óraszám"] . "</td>";
        echo "<td>" . $row["jelleg"] . "</td>";
        echo "<td>" . $row["cím"] . "</td>";
        echo "<td>" . ($row["szemeszter"] ?? 'nem adták meg') . "</td>";
        if($isStudent == "Teacher"){
            echo "<td><a href='teachers_delete_course.php?id=" . $row['kód'] . "'>Delete</a></td>";
        } else if ($isStudent == "Student"){
            echo "<td><a href='student_take_course.php?id=" . $row['kód'] . "'>Take course</a></td>";
        }
        echo "</tr></tbody>";
    }

    echo "</table>";
} else {
    echo "<p>No courses found.</p>";
}
$stmt->close();

