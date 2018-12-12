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
        echo "<td> <a href='#' class = 'charLink' id = '". $record['name']. "'>" . $record['name'] . "</a></td>";
        echo "<td> <img src='img/" . $record['pictureURL'] . "' alt='" . $record['name'] . "' width='100'></td>";
        echo "</tr>";
    }
}

function filterChars() {
    global $dbConn;
    
    $namedParameters = array();

    //This SQL works but it doesn't prevent SQL INJECTION (due to the single quotes)
    //$sql = "SELECT * FROM om_product
    //        WHERE productName LIKE '%$product%'";
  
    $sql = "SELECT * FROM characters WHERE 1"; //Gettting all records from database
    
    if (!empty($_GET['species'])){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND species LIKE :species";
         $namedParameters[':species'] = $_GET['species'];
    }
    
    if (!empty($_GET['gender'])){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND gender =  :gender";
          $namedParameters[':gender'] = $_GET['gender'] ;
    }
    
    //echo $sql;
    
    if (isset($_GET['orderBy'])) {
        
        if ($_GET['orderBy'] == "az") {
            
            $sql .= " ORDER BY name ASC";
        } else {
            
              $sql .= " ORDER BY name DESC";
        }
        
        
    }

    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  

    foreach ($records as $record) {
        echo "<tr>";
        echo "<td> <a href='#' class = 'charLink' id = '". $record['name']. "'>" . $record['name'] . "</a></td>";
        echo "<td> <img src='img/" . $record['pictureURL'] . "' alt='" . $record['name'] . "' width='100'></td>";
        echo "</tr>";
    }


}
?>