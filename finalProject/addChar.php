<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("su_wiki");
//validateSession();

if (isset($_GET['addChar'])) { //checks whether the form was submitted
    
    $charName = $_GET['charName'];
    $description =  $_GET['description'];
    $species =  $_GET['species'];
    $weapon =  $_GET['weapon'];
    $gender = $_GET['gender'];
    $gemstone = $_GET['gemstone'];
    $picture = $_GET['url'];
    
    
    $sql = "INSERT INTO characters (charName, species, weapon, gender, gemstone, description, picture) 
            VALUES (:name, :species, :weapon, :gender, :gemstone, :description, :picture);";
    $np = array();
    
    $np[":charName"] = $charName;
    $np[":species"] = $species;
    $np[":weapon"] = $weapon;
    $np[":gender"] = $gender;
    $np[":gemstone"] = $gemstone;
    $np[":description"] = $description;
    $np[":picture"] = picture;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo $charName. "was added!";
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <Title>Steven Universe Wiki - Admin</Title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Unlock" rel="stylesheet">
        <link  href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-inverse">
          <a class="navbar-brand">Steven Universe Wiki</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="characters.php">Characters</a>
              <a class="nav-item nav-link" href="fusions.php">Fusions</a>
              <a class="nav-item nav-link" href="locations.php">Locations</a>
            </div>
          </div>
          <nav class="navbar navbar-light bg-inverse">
          <form class="form-inline" action="logout.php">
            <button class="btn btn-outline-danger" type="submit">Logout</button>
          </form>
          </nav>
        </nav>
        <header>SU Wiki - Add Character </header>
        <form method="POST">
            Name: <input type="text" id="name"/>
        </form>
    </body>
</html>