<?php 

function displayResults() {
    global $items;
    
    if (isset($items)) {
        echo "<table class = 'table'>";
        foreach ($items as $item) {
            $itemName = $item['name'];
            $itemPrice = $item['salePrice'];
            $itemImage = $item['thumbnailImage'];
            $itemId = $item['itemId'];
            
            //display item as table row
            echo '<tr>';
            echo "<td><img src = '$itemImage'></td>";
            echo "<td><h4>$itemName</h4></td>";
            echo "<td><h4>$itemPrice</h4></td>";
            
            //hidden input element containing the item name
            echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'itemName' value = '$itemName'>";
            echo "<input type = 'hidden' name = 'itemPrice' value = '$itemPrice'>";
            echo "<input type = 'hidden' name = 'itemImage' value = '$itemImage'>";
            echo "<input type = 'hidden' name = 'itemId' value = '$itemId'>";
            
            //check to see if the most recent POST request has the same itemId 
            //if so, this item was just added to the cart. Display diff button
            if ($_POST['itemId'] == $itemId) {
                echo "<td><button class = 'btn btn-success'> Added </button></td>";
            } else {
                echo "<td><button class = 'btn btn-warning'> Add </button></td>";
            }
            echo '</tr>';
            echo "</form>";
        }
        echo '</table>';
    }
}

function displayCart() {
    
    if (isset($_SESSION['cart'])) {
        
        echo "<table class = 'table'>";

        foreach ($_SESSION['cart'] as $key => $item) { 
            $itemId = $item['id'];
            $itemQuant = $item['quantity'];
            
            echo "<tr>";
            //display item as table row
            echo "<td><img src = '" . $item['image'] . "'></td>";
            echo "<td><h4>". $item['name'] . "</h4></td>";
            echo "<td><h4>$". $item['price'] . "</h4></td>";
            
             //update form for this item
            echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'itemId' value = '$itemId'>";
            echo "<td><input type = 'text' name = 'update' class = 'form-control' placeHolder = '$itemQuant'></td>";
            echo "<td><button class = 'btn btn-danger'>Update</button></td>";
            echo "</form>";
            
            //separate form for delete
            echo "<form method = 'post'>";
            echo "<inout type = 'hidden' name = 'removeId' value = '$itemId'>";
            echo "<td><button class = 'btn btn-danger'> Remove </button></td>";
            echo "</form>";
            
            echo "</tr>";
        }
        echo "</table>";
    }
    
    $itemName = $item['name'];
            $itemPrice = $item['price'];
            $itemImage = $item['image'];
}

function displayCartCount() {
    echo count($_SESSION['cart']);
}

?>