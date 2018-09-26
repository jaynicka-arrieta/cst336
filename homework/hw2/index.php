<!DOCTYPE html>

<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    
    <?php include 'inc/functions.php' ?>
    
    <head>
        <meta charset="utf-8"/>
        <title> Random Pet Collage Generator </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    </head>
    
    <body>
        
        <header> 
            <h1> Random Pet Collage Generator </h1>
            <hr>
        </header>
        
        <div class="row"> 
          <?php createGrid(); ?>
        </div>
        
        <footer>
  
            <div>
              
              <hr>
              <h5>
                CST 336 - Internet Programming 2017&copy; Arrieta <br />
                <strong>Disclaimer:</strong> The information in this webpage is fictitious. <br />
                It is used for academic purposes
              </h5>
                
            </div>
      
            <figure>
              <img src="img/csumb.jpg" alt="CSUMB logo" />
            </figure>
  
      </footer>
    
    </body>
</html>