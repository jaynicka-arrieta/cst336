<?php
$month = $_GET['month'];
$number = $_GET['number'];
$location = $_GET['country'];
$order = $_GET['order'];

function displayInfo() {
    global $month, $number, $location;
    
    echo "<hr>
    <h2>$month Itinerary</h2>
    </br>
    <h3>Vsiting $number places in $location</h3>";
}

?>