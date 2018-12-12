<?php

include '.../inc/dbConnection.php';
$dbConn = startConnection("su_wiki");

$sql ="SELECT * FROM characters WHERE name = ".$_GET['charId'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);
echo json_encode($record);
?>