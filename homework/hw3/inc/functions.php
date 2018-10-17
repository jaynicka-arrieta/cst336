<?php
    
    function totalPoints() {
        //global $a1, $a2, $a3, $a4;
        $a1 = $_POST['answers_1'];
        $a2 = $_POST['answers_2'];
        $a3 = $_POST['answers_3'];
        $a4 = $_POST['answers_4'];
        $points = 0;
        
        if ($a1 == "mareep") {
            $points++;
        }
        
        for ($i = 0; $i < count($a2); $i++) {
            if ($a2[$i] == "flying" || $a2[$i] == "ghost" || $a2[$i] == "fire") {
                $points++;
            }
        }
        
        for ($i = 0; $i < count($a3); $i++) {
            if ($a3[$i] == "fast") {
                $points++;
            }
        }
        
        if ($a4 == "chan") {
            $points++;
        }
        return $points;
    }
    
    function displayPoints() {
        $points = totalPoints();
            
        echo "<div id = 'result'>";
        if ($points == 0) {
            echo "<h1> $points/6 You are the worst.<h1></br><img src = 'img/cry.gif' alt = 'cry' width = '300px'/>";
        }
        if ($points > 0 && $points < 3) {
            echo "<h1> $points/6 You are not the very best...<h1></br><img src = 'img/sad.gif' alt = 'sad' width = '300px'/>";
        }
        if ($points >= 3 && $points <=5) {
            echo "<h1> $points/6 You are almost the very best!<h1></br><img src = 'img/happy.gif' alt = 'happy' width = '300px'/>";
        }
        if ($points == 6) {
            echo "<h1> $points/6 You are the very best!! Great Job!!<h1></br><img src = 'img/excite.gif' alt = 'excite' width = '300px'/>";
        }
        echo "</div>";
    }
    
    function formIsValid() {
        if (empty($_POST['answers_1']) || empty($_POST['answers_2']) || empty($_POST['answers_3']) || empty($_POST['answers_4'])) {
            echo "<h1 id = 'warning'>PLEASE SELECT AN ANSWER FOR EVERY QUESTION!!!</h1> </br><img src = 'img/anger.gif' alt = 'anger' width = '300px'/>";
            return false;
        }
        return true;
    }
?>