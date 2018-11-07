<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("c9");

function displayCategories() { 
    global $dbConn;
    
    $sql = "SELECT DISTINCT category FROM p1_quotes ORDER BY category";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record) {
        echo "<option value='" . $record['category'] . "'" . ($_GET['category'] == $record['category'] ? 'selected' : '') . ">" . $record['category'] . "</option>";
    }
}

function filterQuotes() {
    global $dbConn;
    
    $namedParameters = array();
    $keyword = $_GET['keyword'];
    
    //This SQL works but it doesn't prevent SQL INJECTION (due to the single quotes)
    //$sql = "SELECT * FROM om_product
    //        WHERE productName LIKE '%$product%'";
  
    $sql = "SELECT * FROM p1_quotes WHERE 1"; //Gettting all records from database
    
    if (!empty($keyword)){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND quote LIKE :keyword";
         $namedParameters[':keyword'] = "%$keyword%";
    }
    
    if (!empty($_GET['category'])){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND category =  :category";
         $namedParameters[':category'] = $_GET['category'] ;
    }
    
    if (isset($_GET['order'])) {
        if ($_GET['order'] == "az") {
            $sql .= " ORDER BY quote ASC";
        } else {
              $sql .= " ORDER BY quote DESC";
        }
    }

    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  

    foreach ($records as $record) {
        
        echo $record['quote'];
        echo " <i>(" . $record['author'] . ")</i></br></br>";   
        
    }


}


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Famous Quote Finder</title>
        <link rel='stylesheet' href='styles.css' type='text/css' />
    </head>
    <body>
        
        <header>
            <center>Famous Quote Finder</center>
        </header>
        </br>
        
        <center>
            <form method="GET">
                <b>Enter Quote Keyword:</b> 
                <input type="text" name="keyword" placeholder="keyword" value = "<?php if (isset($_GET['keyword'])) echo $_GET['keyword']; ?>" />
                </br></br>
                
                <b>Category:</b> 
                <select name="category">
                    <option value = "">Select One</option>
                    <?=displayCategories()?>
                </select>
                </br></br>
                
                <b>Order by:</b> </br> 
                <input type = "radio" name = "order" value = "az" <?php if (isset($_GET[ 'order']) && $_GET[ 'order'] =='az'){echo ' checked="checked"';}?>/> A-Z</br>
                <input type = "radio" name = "order" value = "za" <?php if (isset($_GET[ 'order']) && $_GET[ 'order'] =='za'){echo ' checked="checked"';}?>/> Z-A
                </br></br>
                
                <input type = "submit" class = "button" name = "submit" value = "Display Quotes!" />
                </br></br>
                
                <?php 
                if (isset($_GET['submit'])) {
                    filterQuotes();
                }
                ?>
            </form>
        </center>
    </body>
</html>