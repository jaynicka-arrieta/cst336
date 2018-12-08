<?php 
  include '../../inc/dbConnection.php';
  $dbConn = startConnection("pets");
  function getAllPets(){
      global $dbConn;
      
      $sql = "SELECT pictureURL FROM pets ORDER BY name ASC";
      
      $stmt = $dbConn->prepare($sql);
      $stmt->execute();
      $records = $stmt->fetchAll(PDO::FETCH_ASSOC); 
      
      return $records;
  }
  
?>
<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
            body {
                text-align: center;
            }
            
            #carouselExampleControls {
              width: 50%;
            }
            .carousel-inner {
              height: 800px;
            }
            
            .carousel-inner > .carousel-item > img {
              width: 100%;
              height: 100%;
            }
            
            .carousel-control-prev-icon, .carousel-control-next-icon {
                height: 60px;
                width: 60px;
                outline: black;
                background-color: rgba(0, 0, 0, 0.3);
                background-size: 100%, 100%;
            }
            
            ol.carousel-indicators {
              position: absolute;
              bottom: 0;
              margin: 0;
              left: 0;
              right: 0;
              width: auto;
            }
            
            ol.carousel-indicators li,
            ol.carousel-indicators li.active {
              float: left;
              width: 33%;
              height: 10px;
              margin: 0;
              border-radius: 0;
              border: 0;
              background: transparent;
            }
            
            ol.carousel-indicators li.active {
              background: cyan;
            }
            
        </style>
   
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">CSUMB</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adoptions.php">Adoptions</a>
          </li>
        </ul>
      </div>
      </nav>
      <div class="jumbotron">
        <h1> CSUMB Animal Shelter</h1>
        <h2> The "official" animal adoption website of CSUMB </h2>
      </div>
    
      <!-- Display Carousel here  -->
      <center>
        <!-- indicator -->
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <?php
            $petsURL = getAllPets();
            //print_r($petsURL);
            for ($i=1; $i < sizeof($petsURL); $i++) { 
              echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
            }
           ?>
        </ol>
        <div class="carousel-inner">
                  
          <?php
            $pets = getAllPets();
            $url = [];
            foreach ($petsURL as $k=>$v) {
              foreach ($v as $s=>$t) {
                array_push($url, $t);
              }
            }
            for ($i = 0; $i < sizeof($url); $i++) {
                echo "<div class=\"carousel-item ";
                echo ($i == 0)?" active ":"";
                echo "\">";
                echo "<img class=\"d-block w-100\" src=\"img/".$url[$i]."\" alt=\"Second slide\">";
                echo "</div>";
            }
          ?>
           
        </div>
        
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      </center>
      </br></br>
      
      <a class="btn btn-outline-success" href="adoptions.php" role="button">Adopt Now</a>
      <br><br><br>
      <?php
      include 'inc/footer.php';
      
      ?>
    </body>

</html>