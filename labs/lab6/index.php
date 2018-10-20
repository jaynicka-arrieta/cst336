<?php 
    include 'dbConnection.php';
    $conn = getDatabaseConnection("ottermart");
    
    function displayCategories() {
        global $conn;
        $sql = "SELECT catID, catName from om_category ORDER BY catName";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option value = '". $record["catId"] . "' >" . $record["catName"] . "</option>";
        }
    }
    
    function displaySearchResults() {
        global $conn;
        
        if (isset($_GET['searchForm'])) {
            echo "<h3>Products Found: </h3>";
            $namedParameters = array();
            
            $sql = "SELECT * FROM om_product WHERE 1";
            
            if (!empty($_GET['product'])) {
                $sql .= " AND productName LIKE :productName";
                // .= means that it will add to the end of the query already in $sql 
                $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
                //when using Named Parameters you are generally saving the information from the form into an array
            }
            
            if (!empty($_GET['category'])) {
                $sql .= " AND catId LIKE :categoryId";
                $namedParameters[":categoryId"] = $_GET['category'];
            }
            
            if (!empty($_GET['priceFrom'])) {
                $sql .= " AND price >= :priceFrom";
                $namedParameters[":priceFrom"] = $_GET['priceFrom'];
            }
            
            if (!empty($_GET['priceTo'])) {
                $sql .= " AND price <= :priceTo";
                $namedParameters[":priceTo"] = $_GET['priceTo'];
            }
            
            if (isset($_GET['orderBy'])) {
                if ($GET['orderBy'] == "price") {
                    $sql .= " ORDER BY price";
                } else {
                    $sql .= " ORDER BY productName";
                }
            }
            
            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($records as $record) {
                echo $record["productName"] . " " . $record["productDescription"] . " $" . $record["price"] . "</br></br>";
            }
        }
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>OtterMart Product Search</title>
        <link href = "css/styles.css" rel = "stylesheet" type = "text/css" />
    </head>
    
    <body>
        
        <div>
            <h1>OtterMart Product Search</h1>
            
            <form>
                Product: <input type = "text" name = "product"/>
                </br></br>
                Category: 
                    <select name = "category">
                        <option value = "">Select One</option>
                        <?php displayCategories(); ?>
                    </select>
                </br></br>
                Price: From <input type = "text" name = "priceFrom" size = "7"/>
                       To <input type = "text" name = "priceTo" size = "7"/>
                </br></br>
                Order results by: </br>
                <input type = "radio" name = "orderBy" value = "price" /> Price </br>
                <input type = "radio" name = "orderBy" value = "name" /> Name 
                
                </br></br>
                <input type = "submit" value = "Search" name = "searchForm" />
            </form>
            
            </br>
        </div>
        <hr>
        <?php displaySearchResults(); ?>
    </body>
</html>