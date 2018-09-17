<!DOCTYPE html>
<html>

<head>
    <title> RPS </title>
    <style type="text/css">
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            text-align: center;
            margin: 0 70px;
        }

        .matchWinner {
            background-color: yellow;
            margin: 0 70px;
        }

        #finalWinner {
            margin: 0 auto;
            width: 500px;
            text-align: center;
        }
        
        hr {
            width:33%;
        }        
    </style>
</head>

<body>

    <h1> Rock, Paper, Scissors </h1>

    <div class="row">
        <div class="col">
            <h2>Player 1</h2>
        </div>
        <div class="col">
            <h2>Player 2</h2>
        </div>
    </div>
    
    <?php
    function displaySymbol($randomValue1, $randomValue2) {
        switch ($randomValue1) {
            case 0: $symbol1 = "rock";
                    break;
            case 1: $symbol1 = "paper";
                    break;
            case 2: $symbol1 = "scissors";
                    break;
        }
        
        switch ($randomValue2) {
            case 0: $symbol2 = "rock";
                    break;
            case 1: $symbol2 = "paper";
                    break;
            case 2: $symbol2 = "scissors";
                    break;
        }
        
        echo "<div class='row'>";
        if($symbol1 == "rock" &&  $symbol2 == "scissors" ||  $symbol1 == "paper" &&  $symbol2 == "rock" || $symbol1 == "scissors" &&  $symbol2 == "paper"){
            echo"<div class='col, matchWinner'><img src='img/rps/$symbol1.png' alt ='$symbol1' width='150'></div>";
        } else {
            echo "<div class='col'><img src='img/rps/$symbol1.png' alt ='$symbol1' width='150'></div>";
        }
        
        if($symbol2 == "rock" &&  $symbol1 == "scissors" ||  $symbol2 == "paper" &&  $symbol1 == "rock" || $symbol2 == "scissors" &&  $symbol1 == "paper"){
            echo"<div class='col, matchWinner'><img src='img/rps/$symbol2.png' alt ='$symbol2' width='150'></div>";
        } else {
            echo "<div class='col'><img src='img/rps/$symbol2.png' alt ='$symbol2' width='150'></div>";
        }
        echo"</div>
            <hr>";
    }
    
    function draw() {
        $p1 = 0;
        $p2 = 0;
        $winner;
        for ($i = 0; $i < 3; $i++) {
            
            $randomValue1 = rand(0,2);
            $randomValue2 = rand(0,2);
            while ($randomValue1 == $randomValue2) {
                $randomValue1 = rand(0,2);
            }
            if ($randomValue1 == 0 && $randomValue2 == 2 || $randomValue1 == 1 && $randomValue2 == 0 || $randomValue1 == 2 && $randomValue2 == 1) {
                $p1++;
            }
            else {
                $p2++;
            }
            
            displaySymbol($randomValue1, $randomValue2);
        }
        
        if ($p1 > $p2) {
            $winner = "1";
        } else {
            $winner = "2";
        }
        
        echo "<div id='finalWinner'>

                <h1>The winner is Player $winner</h1>

            </div>";
    }
    
    draw();
    
    ?>
    Images source: https://www.kisspng.com/png-rockpaperscissors-game-money-4410819/
</body>

</html>
