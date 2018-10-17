<?php 
    include 'inc/functions.php';
    session_start(); 
    
    if (!isset($_SESSION['answers'])) {
        $_SESSION['answers'] = array();
    }
    
    if (isset($_POST['submit'])) {
        $a1 = $_POST['answers_1'];
        $a2 = $_POST['answers_2'];
    }
?>
<!DOCTYPE hmtl>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <title>Pokemon Quiz</title>
    </head>
    
    <body>
        <header><h1>Are You The Very Best?</h1></header>
        </br></br>
        
        <div id = "quiz">
            <form method = "POST">
                <div id = "q1">
                    <h4>1) Which of these pokemon are not part of Gen 1?</h4> </br>
                    <input type = "radio" name = "answers_1" value = "haunter" <?php if (isset($_POST[ 'answers_1']) && $_POST[ 'answers_1'] =='haunter'){echo ' checked="checked"';}?>/> <img src="img/haunter.png" alt="haunter" width = 100px/>
                    <input type = "radio" name = "answers_1" value = "mareep" <?php if (isset($_POST[ 'answers_1']) && $_POST[ 'answers_1'] =='mareep'){echo ' checked="checked"';}?>/> <img src="img/mareep.png" alt="mareep" width = 100px/>
                    <input type = "radio" name = "answers_1" value = "vulpix" <?php if (isset($_POST[ 'answers_1']) && $_POST[ 'answers_1'] =='vulpix'){echo ' checked="checked"';}?>/> <img src="img/vulpix.png" alt="vulpix" width = 100px/>
                    <input type = "radio" name = "answers_1" value = "wiggly" <?php if (isset($_POST[ 'answers_1']) && $_POST[ 'answers_1'] =='wiggly'){echo ' checked="checked"';}?>/> <img src="img/wiggly.png" alt="wiggly" width = 100px/>
                </div>
                
                </br></br>
                
                <div id = "q2">
                    <h4>2) What types are Shedinja weak to? <img src="img/shedinja.png" alt="shedinja" width = 100px/></h4> 
                    <input type = "checkbox" name = "answers_2[]" value = "flying"/> Flying <br>
                    <input type = "checkbox" name = "answers_2[]" value = "ghost"/> Ghost <br>
                    <input type = "checkbox" name = "answers_2[]" value = "normal"/> Normal <br>
                    <input type = "checkbox" name = "answers_2[]" value = "fire"/> Fire <br>
                    <input type = "checkbox" name = "answers_2[]" value = "ice"/> Ice <br>
                </div>
                
                </br></br>
                
                <div id = "q3">
                    <h4>3) Which of these type(s) is not a real type?</h4>
                    <input type = "checkbox" name = "answers_3[]" value = "false"/> Ice <br>
                    <input type = "checkbox" name = "answers_3[]" value = "false"/> Dragon <br>
                    <input type = "checkbox" name = "answers_3[]" value = "false"/> Fairy <br>
                    <input type = "checkbox" name = "answers_3[]" value = "false"/> Ghost <br>
                    <input type = "checkbox" name = "answers_3[]" value = "fast"/> Fast <br>
                    <input type = "checkbox" name = "answers_3[]" value = "false"/> Dragon <br>
                </div>
                
                </br></br>
                
                <div id = "q4">
                    <h4>4) What pokemon is this? </h4> </br>
                    <img src="img/chan.png" alt="chandelure" width = "300px"/> </br></br>
                    <select name = "answers_4">
                        <option value = "">Select One</option>
                        <option value = "false">Charizard</option>
                        <option value = "false">Shedinja</option>
                        <option value = "chan">Chandelure</option>
                        <option value = "false">Pikachu</option>
                        <option value = "false">Totodile</option>
                        <option value = "false">Squirtle</option>
                        <option value = "false">Swampert</option>
                    </select>
                </div>
                
                </br></br>
            
                <input type = "submit" name = "submit" value = "Check my results!" />
            </form>
        </div>
        
        <?php 
            if (isset($_POST['submit']) && formIsValid()) {
                displayPoints();
            }
            
        ?>
        
        <footer>
            <div>
              <hr>
              <h5>
                CST 336 - Internet Programming 2018&copy; Arrieta <br />
                <strong>Disclaimer:</strong> The information in this webpage is fictitious. <br />
                It is used for academic purposes
              </h5>
            </div>
            <figure>
              <img src="img/csumb.jpg" alt="CSUMB logo" />
            </figure>
      </footer>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>