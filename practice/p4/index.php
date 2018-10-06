<?php 
    function createTable() {
        $row = $_GET["rows"];
        $col = $_GET["col"];
        
        
        
        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $col; $j++) {
                echo selectCards();
            }
            echo "<br/>"; 
        }
        
    }
    
    function selectCards() {
        $suits = array("clubs", "diamonds", "hearts", "spades");
        
        $select_value;
        
        if(isset($_POST['submit'])) {
            $select_value = $_POST['suits'];
        }
        
        
        $random = rand(0, count($suits));
        do {
            $random = rand(0, count($suits));
        }
        while ($suits[$random] == $select_value);
        
        
        $card = rand(1, 13);
        $finalSuit = $suits[$random];
        
        $picture = "<img src= 'cards/$finalSuit/$card.png' alt='test' title=  '$card' />";
        
        return $picture;
    }
?>



<!DOCTYPE html>
<html>
    
    <head>
        <title>Aces vs Kings</title>
        
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    
    <body>
        
        <br /><br />
        
        <form class="avk">
            Aces vs Kings 
            <div id="row">
                Number of rows: <input type="number" name="rows"/>
            </div>
            <div id="col">
                Number of columns: <input type="number" name="col"/>
            </div>
            <div>
                Suit to omit: 
                <select name="suits">
                  <option value="hearts">Hearts</option>
                  <option value="clubs">Clubs</option>
                  <option value="spades">Spades</option>
                  <option value="diamonds">Diamonds</option>
                </select>
                <input type="submit" value="Submit"/>
            </div>
            
        </form>
        
        <div id="table">
            <br />
            <?php createTable(); ?>
        </div>
        
        <br /><br />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    </body>
</html>