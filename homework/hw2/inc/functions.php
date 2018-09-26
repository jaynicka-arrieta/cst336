<?php
    
    $pictures = array();
    
    for ($i = 0; $i <= 90; $i++) {
            array_push($pictures, $i);
    }

    function createColumn() {
        global $pictures;
        shuffle($pictures);
        
        $show = array_rand($pictures, 4);

        for ($i = 0; $i < 4; $i++) {
            $num = $show[$i];
            echo "<img src ='pets/$num.jpg' alt = '$num' title = 'pet picture number: $num' >";
        }
        sort($pictures);
    }
    
    function createGrid() {
        funFact();
        echo "<br />";
        for ($i = 0; $i < 4; $i++) {
            echo "<div class = column> ";
            createColumn($pictures);
            echo "</div>";
        }
    }
    
    function funFact() {
        $random = rand(0,11);
        //$random = 0;
        switch ($random) {
            case 0: $fact = "The dark grey cat is Artemis. She's named after the Greek goddess of the moon.";
                break;
            case 1: $fact = "The pure white cat is Conchita. She's named after the Spanish sweet bread, concha.";
                break;
            case 2: $fact = "The gecko's name is Toa, short for Krakatoa. She's the only scaly child among the children.";
                break;
            case 3: $fact = "The blonde cat with a cloudy eye is Kopi. He likes to go in the trash and steal Artemis' feathery toys.";
                break;
            case 4: $fact = "The lightly toasted colored dog is Valentina. She's named after the Valentina brand hot sauce.";
                break;
            case 5: $fact = "The orange cat with a star tag is Bodhi. His name means 'Elightenment,' and he knows where the red dot comes from.";
                break;
            case 6: $fact = "The orange cat with a blue collar is Spencer. We don't know much about Spencer; he's a mystery.";
                break;
            case 7: $fact = "The white dog with an old lady face is Scout. She was a rental dog for the summer.";
                break;
            case 8: $fact = "The brown dog is Kono. She waddles.";
                break;
            case 9: $fact = "The dark orange cat with freckles on his nose is Jerry. He doesn't do much.";
                break;
            case 10: $fact = "The big husky is Jax. He's named after an alcohol brand.";
                break;
            case 11: $fact = "The light brown dog is Brownie. He's a sausage.";
                break;
        }
        
        echo "<div class = 'funfact'> <h3> $fact </h3> </div>";
        
        if ($random % 2 == 0) {
            echo " <div class = 'fly'> <img src = 'img/fly.gif' alt = 'fly' title = 'flying cat' /> </div>";
        }
    }


?>