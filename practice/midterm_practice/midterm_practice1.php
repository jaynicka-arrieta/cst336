<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Winter Vacation Planner</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    </head>
    
    <body>
        
        <header><h1>Winter Vacation Planner!!</h1></header>
        
        <div id = "selections">
            <div>
            <form method = "GET">
            Select Month:
            <select name = "month">
                <option> Select </option>
                <option value = "November"> November </option>
                <option value = "December"> December </option>
                <option value = "January"> January </option>
                <option value = "February"> February</option>
            </select>
            </div>
            
            </br></br>
            
            <div>
            Number of Locations:
            <input type = "radio" name = "number" value = "3"> <b>Three</b>
            <input type = "radio" name = "number" value = "4"> <b>Four</b>
            <input type = "radio" name = "number" value = "5"> <b>Five</b>
            </div>

            </br></br>
            
            <div>
            Select Country:
            <select name = "country">
                <option value = "USA"> USA </option>
                <option value = "Mexico"> Mexico </option>
                <option value=  "France"> France </option>
            </select>
            </div>

            </br></br>
            
            <div>
            Visit locations in alphabetical order:
            <input type = "radio" name = "order" value = "az"> <b>A-Z</b>
            <input type = "radio" name = "order" value = "za"> <b>Z-A</b>
            <input type = "submit" value = "create itinerary"
            </div>
            
            </br></br>
            
            <?php
                include 'inc/functions.php';
                displayInfo();
                 
            ?>
            
            </form>
            
            
            
        </div>
        
    </body>
</html>