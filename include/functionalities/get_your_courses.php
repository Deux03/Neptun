<?php
include_once("./include/db/mysql_connect.php");

$orderBy = isset($_GET['orderby']) ? $_GET['orderby'] : 'vizsga.kód';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$username = $_COOKIE["username"];

// A táblák nevei és a rendezési oszlop neve dinamikus beállítása
$sortingColumns = [
    'kurzus_kód' => 'kurzus.kód',
    'férőhely' => 'kurzus.férőhely',
    'heti_óraszám' => 'kurzus.`heti óraszám`',
    'jelleg' => 'kurzus.jelleg',
    'cím' => 'kurzus.cím',
];

$orderBy = isset($_GET['orderby']) && array_key_exists($_GET['orderby'], $sortingColumns)
    ? $sortingColumns[$_GET['orderby']]
    : 'kurzus.kód';

$stm = $conn->prepare("
    SELECT hallgatja.kód AS kurzus_kód, kurzus.férőhely, kurzus.`heti óraszám`, kurzus.jelleg, kurzus.cím
    FROM hallgatja
    JOIN kurzus ON hallgatja.kód = kurzus.kód
    WHERE hallgatja.`felhasználó név` = ?
    ORDER BY $orderBy $order
");

$stm->bind_param("s", $username);
$stm->execute();

$result = $stm->get_result();
if ($result->num_rows > 0) {
    echo "<h2>You've applied for $result->num_rows courses:</h2>";
    echo "<table><thead>";
    echo "<tr>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=kurzus_kód&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Kurzus Kódja &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=férőhely&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Heti óraszám &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=heti_óraszám&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Férőhely &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=jelleg&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Jelleg &#9650;&#9660;</th>";
    echo "<th class='sortable' onclick=\"window.location.href='?orderby=cím&order=" . ($order === 'ASC' ? 'DESC' : 'ASC') . "'\">Cím &#9650;&#9660;</th>";
    echo "</tr></thead><tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["kurzus_kód"] . "</td>";
        echo "<td>" . $row["férőhely"] . "</td>";
        echo "<td>" . $row["heti óraszám"] . "</td>";
        echo "<td>" . $row["jelleg"] . "</td>";
        echo "<td>" . $row["cím"] . "</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>>You've applied for no courses at all!</p>";
}

$stm->close();
?>
