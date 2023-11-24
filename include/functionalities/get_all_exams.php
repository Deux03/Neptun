<?php
include_once("./include/db/mysql_connect.php");
$orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'kód';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$stm = $conn->prepare("SELECT * FROM vizsga ORDER BY `$orderBy` $order;");
$stm->execute();
$result = $stm->get_result();

if ($result->num_rows > 0) {
    echo "<h2>All of the exams</h2>";
    echo "<table><thead>";
    echo "<tr>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=kód&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Kód &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=időpont&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Időpont &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=férőhely&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Férőhely &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=jelleg&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Jelleg &#9650;&#9660;</th>";
    if ($isStudent == "Teacher") {
        echo "<th>Edit</th>";
        echo "<th>Delete</th>";
    } else if ($isStudent == "Student") {
        echo "<th>Take exam</th>";
    }
    echo "</tr></thead>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><tbody>";
        echo "<td>" . $row["kód"] . "</td>";
        echo "<td>" . $row["időpont"] . "</td>";
        echo "<td>" . $row["férőhely"] . "</td>";
        echo "<td>" . $row["jelleg"] . "</td>";
        if ($isStudent == "Teacher") {
            echo "<td><a href='./teachers_edit_exam.php?id=" . $row['kód'] .
                "&ferohely=" . urlencode($row['férőhely']) .
                "&ido=" . urlencode($row['időpont']) .
                "&jelleg=" . urlencode($row['jelleg']) . "'>Edit</a></td>";
            echo "<td><a href='teachers_delete_exam.php?id=" . $row['kód'] . "'>Delete</a></td>";
        } else if ($isStudent == "Student") {
            echo "<td><a href='./student_take_exam.php?id=" . $row['kód'] .
                "&idopont=" . urlencode($row['időpont']) . "'>Take exam</a></td>";
        }
        echo "</tr></tbody>";
    }

    echo "</table>";
} else {
    echo "<p>No courses found.</p>";
}
$stm->close();
