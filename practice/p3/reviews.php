<?php

include 'inc/charts.php';
$posters = array("ready_player_one","rampage","paddington_2","hereditary","alpha","black_panther","christopher_robin","coco","dunkirk","first_man");
$movieName = array();

function movieReviews() {
    global $posters, $movieName;
    
    $randomPoster = $posters[rand(0,count($posters)-1)];
    $name;
    
    switch($randomPoster) {
        case "ready_player_one": $name = "Ready Player One";
            break;
        case "rampage": $name = "Rampage";
            break;
        case "paddington_2": $name = "Paddington 2";
            break;
        case "hereditary": $name = "Hereditary";
            break;
        case "alpha": $name = "Alpha";
            break;
        case "black_panther": $name = "Black Panther";
            break;
        case "christopher_robin": $name = "Christopher Robin";
            break;
        case "coco": $name = "Coco";
            break;
        case "dunkirk": $name = "Dunkirk";
            break;
        case "first_man": $name = "First Man";
            break;
    }
    
    array_push($movieName, $name);
    
    echo "<div class='poster'>";
    echo "<h2> $name </h2>";
    echo "<img width='100' src='img/posters/$randomPoster.jpg'>";    
    echo "<br>";
    
    //NOTE: $totalReviews must be a random number between 100 and 300
    $totalReviews = rand(100,301); 
    
    //NOTE: $ratings is an array of 1-star, 2-star, 3-star, and 4-star rating percentages
    //      The sum of rating percentages MUST be 100
    $ratings = array();
    $prevRand = rand(0, 50);
    $totalRatings = 100 - $prevRand;
    array_push($ratings, $prevRand);
    
    for ($i = 0; $i < 2; $i++) {
        $random = rand(0, $totalRatings);
        array_push($ratings, $random);
        $totalRatings -= $random;
    }
    
    array_push($ratings, $totalRatings);
    shuffle($ratings);
    
    //NOTE: displayRatings() displays the ratings bar chart and
    //      returns the overall average rating
    $overallRating = displayRatings($totalReviews,$ratings);
    
    //NOTE: The number of stars should be the rounded value of $overallRating
    echo "<br><img src='img/star.png' width='25'>";
    echo "<img src='img/star.png' width='25'>";
    
    echo "<br>Total reviews: $totalReviews";
    echo "</div>";
}    

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Movie Reviews </title>
        <style type="text/css">
            body {
                text-align:center;
                background-image:url("img/bg.jpg");
            }
            #main {
                display:flex;
                justify-content: center;
                color: white;
            }
            .poster {
                padding: 0 10px;
            }
        </style>
    </head>
    <body>
       
       <h1> Movie Reviews </h1>
        <div id="main">
           <?php
             //NOTE: Add for loop to display 4 movie reviews
             $randPosters = array();
             
             for ($i = 0; $i < 4; $i++) {
                 array_push($randPosters, movieReviews());
             }
           ?>
       </div>
       <br/>
       <hr>
       <h1>Based on ratings you should watch:</h1>
       
    </body>
</html>