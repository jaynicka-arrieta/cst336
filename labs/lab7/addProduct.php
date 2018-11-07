<?php
session_start();

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'inc/functions.php';
validateSession();

if (isset($_GET['addProduct'])) { //checks whether the form was submitted
    
    $productName = $_GET['productName'];
    $description =  $_GET['description'];
    $price =  $_GET['price'];
    $catId =  $_GET['catId'];
    $image = $_GET['productImage'];
    
    
    $sql = "INSERT INTO om_product (productName, productDescription, productImage,price, catId) 
            VALUES (:productName, :productDescription, :productImage, :price, :catId);";
    $np = array();
    $np[":productName"] = $productName;
    $np[":productDescription"] = $description;
    $np[":productImage"] = $image;
    $np[":price"] = $price;
    $np[":catId"] = $catId;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New Product was added!";
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Product </title>
    </head>
    <link rel='stylesheet' href='css/styles.css' type='text/css' />
    <body>
        <center>
        <h1> Adding New Product </h1>
        
        <form>
           Product name: <input type="text" name="productName"></br></br>
           Description: <textarea name="description" cols="50" rows="4"></textarea></br></br>
           Price: <input type="text" name="price"></br></br>
           Category: 
           <select name="catId">
              <option value="">Select One</option>
              <?php
              
              $categories = getCategories();
              
              foreach ($categories as $category) {
                  
                  echo "<option value='".$category['catId']."'>" . $category['catName'] . "</option>";
                  
              }
              
              ?>
           </select> </br></br>
           Set Image Url: <input type="text" name="productImage"></br></br>
           <input type="submit" name="addProduct" value="Add Product">
        </form>
        </center>
    </body>
</html>