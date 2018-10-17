<?php 
    include 'inc/functions.php';
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
        <header><h1 id = "title">Are You The Very Best?</h1></header>
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
                    <input type = "checkbox" name = "answers_2[]" value = "flying" <?php if(in_array('flying',$_POST['answers_2'])) echo 'checked'; ?>/> Flying <br>
                    <input type = "checkbox" name = "answers_2[]" value = "ghost" <?php if(in_array('ghost',$_POST['answers_2'])) echo 'checked'; ?>/> Ghost <br>
                    <input type = "checkbox" name = "answers_2[]" value = "normal" <?php if(in_array('normal',$_POST['answers_2'])) echo 'checked'; ?>/> Normal <br>
                    <input type = "checkbox" name = "answers_2[]" value = "fire" <?php if(in_array('fire',$_POST['answers_2'])) echo 'checked'; ?>/> Fire <br>
                    <input type = "checkbox" name = "answers_2[]" value = "ice" <?php if(in_array('ice',$_POST['answers_2'])) echo 'checked'; ?>/> Ice <br>
                </div>
                
                </br></br>
                
                <div id = "q3">
                    <h4>3) Which of these type(s) is not a real type?</h4>
                    <input type = "checkbox" name = "answers_3[]" value = "ice" <?php if(in_array('ice',$_POST['answers_3'])) echo 'checked'; ?>/> Ice <br>
                    <input type = "checkbox" name = "answers_3[]" value = "dragon" <?php if(in_array('dragon',$_POST['answers_3'])) echo 'checked'; ?>/> Dragon <br>
                    <input type = "checkbox" name = "answers_3[]" value = "fairy" <?php if(in_array('fairy',$_POST['answers_3'])) echo 'checked'; ?>/> Fairy <br>
                    <input type = "checkbox" name = "answers_3[]" value = "ghost" <?php if(in_array('ghost',$_POST['answers_3'])) echo 'checked'; ?>/> Ghost <br>
                    <input type = "checkbox" name = "answers_3[]" value = "fast" <?php if(in_array('fast',$_POST['answers_3'])) echo 'checked'; ?>/> Fast <br>
                    <input type = "checkbox" name = "answers_3[]" value = "psychic" <?php if(in_array('psychic',$_POST['answers_3'])) echo 'checked'; ?>/> Psychic <br>
                </div>
                
                </br></br>
                
                <div id = "q4">
                    <h4>4) What pokemon is this? </h4> </br>
                    <img src="img/chan.png" alt="mystery" width = "300px"/> </br></br>
                    <select name = "answers_4">
                        <option value = "">Select One</option>
                        <option <?php if ($_POST['answers_4'] == 'chari') { ?>selected="true" <?php }; ?> value = "chari">Charizard</option>
                        <option <?php if ($_POST['answers_4'] == 'shed') { ?>selected="true" <?php }; ?> value = "shed">Shedinja</option>
                        <option <?php if ($_POST['answers_4'] == 'chan') { ?>selected="true" <?php }; ?> value = "chan">Chandelure</option>
                        <option <?php if ($_POST['answers_4'] == 'pika') { ?>selected="true" <?php }; ?> value = "pika">Pikachu</option>
                        <option <?php if ($_POST['answers_4'] == 'toto') { ?>selected="true" <?php }; ?> value = "toto">Totodile</option>
                        <option <?php if ($_POST['answers_4'] == 'squi') { ?>selected="true" <?php }; ?> value = "squi">Squirtle</option>
                        <option <?php if ($_POST['answers_4'] == 'swam') { ?>selected="true" <?php }; ?> value = "swam">Swampert</option>
                    </select>
                </div>
                
                </br></br>
            
                <input type = "submit" class = "button" name = "submit" value = "Check my results!" />
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