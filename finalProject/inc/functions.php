<?php
include '../inc/dbConnection.php';
$dbConn = startConnection("su_wiki");

function displayAllChars(){
    global $dbConn;
    
    $sql = "SELECT * FROM characters ORDER BY name";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records

    foreach ($records as $record) {
        echo "<tr>";
        echo "<td> " . $record['name'] . "</td>";
        echo "<td> <img src='img/" . $record['pictureURL'] . "' alt='" . $record['name'] . "' width='100'></td>";
        echo "</tr>";
    }
}
?>