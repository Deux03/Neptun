<?php
include_once("./include/db/mysql_connect.php");

$orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'vizsga.kód';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

$username = $_COOKIE["username"];
echo "<h1>$username</h1>";

$sortingColumns = [
    'kód' => 'vizsga.kód',
    'időpont' => 'vizsga.időpont',
    'férőhely' => 'vizsga.férőhely',
    'jelleg' => 'vizsga.jelleg',
];

$orderBy = isset($_GET['orderby']) && array_key_exists($_GET['orderby'], $sortingColumns)
    ? $sortingColumns[$_GET['orderby']]
    : 'vizsga.kód';

$stm = $conn->prepare("
SELECT vizsga.kód, vizsga.időpont, vizsga.férőhely, vizsga.jelleg,
    (SELECT COUNT(*)
     FROM jelentkezik
     WHERE jelentkezik.`felhasználó név` = ?) AS exam_count
FROM vizsga
LEFT JOIN jelentkezik ON vizsga.kód = jelentkezik.kód AND vizsga.időpont = jelentkezik.időpont
WHERE jelentkezik.`felhasználó név` = ?
ORDER BY $orderBy $order;
");



$stm->bind_param("ss", $username, $username);
$stm->execute();

$result = $stm->get_result();


if ($result->num_rows > 0) {
    echo "<h2>Exams:</h2>";
    $row = $result->fetch_assoc();
    $examCount = isset($row['exam_count']) ? $row['exam_count'] : 0;

    echo "<h3>You've applied for $examCount exams</h3>";
    echo "<table><thead>";
    echo "<tr>";
    foreach ($sortingColumns as $key => $column) {
        echo "<th class='sortable' onclick=\"window.location.href='?orderby=$key&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">" . htmlspecialchars($key) . " &#9650;&#9660;</th>";
    }
    echo "</tr></thead><tbody>";

    do {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["kód"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["időpont"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["férőhely"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["jelleg"]) . "</td>";
        echo "</tr>";
    } while ($row = $result->fetch_assoc());

    echo "</tbody></table>";
} else {
    echo "<p>No exams found!</p>";
}

$stm->close();
