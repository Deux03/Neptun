<?php
include_once("./include/db/mysql_connect.php");

$orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'vizsga.kód';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$username = $_COOKIE["username"];

// A táblák nevei és a rendezési oszlop neve dinamikus beállítása
$sortingColumns = [
    'kurzus_kód' => 'vizsga.kód',
    'időpont' => 'vizsga.időpont',
    'férőhely' => 'vizsga.férőhely',
    'jelleg' => 'vizsga.jelleg',
];

$orderBy = isset($_GET['orderby']) && array_key_exists($_GET['orderby'], $sortingColumns)
    ? $sortingColumns[$_GET['orderby']]
    : 'vizsga.kód';

$stm = $conn->prepare("
    SELECT vizsga.kód AS kurzus_kód, vizsga.időpont, vizsga.férőhely, vizsga.jelleg
    FROM jelentkezik
    JOIN vizsga ON jelentkezik.kód = vizsga.kód
                AND jelentkezik.időpont = vizsga.időpont
    WHERE jelentkezik.`felhasználó név` = ?
    ORDER BY $orderBy $order
");

$stm->bind_param("s", $username);
$stm->execute();

$result = $stm->get_result();
if ($result->num_rows > 0) {
    echo "<h2>You've applied for $result->num_rows exmas:</h2>";
    echo "<table><thead>";
    echo "<tr>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=kurzus_kód&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Kurzus Kódja &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=időpont&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Vizsga Időpontja &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=férőhely&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Férőhely &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=jelleg&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Jelleg &#9650;&#9660;</th>";
    echo "</tr></thead><tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["kurzus_kód"] . "</td>";
        echo "<td>" . $row["időpont"] . "</td>";
        echo "<td>" . $row["férőhely"] . "</td>";
        echo "<td>" . $row["jelleg"] . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>>You've applied for no exmas at all!</p>";
}

$stm->close();
?>
