<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("su_wiki");
//validateSession();

if (isset($_POST['submit'])) { //checks whether the form was submitted
    
    $charName = $_POST['name'];
    $description =  $_POST['description'];
    $species =  $_POST['species'];
    $weapon =  $_POST['weapon'];
    $gender = $_POST['gender'];
    $gemstone = $_POST['gemstone'];
    $picture = $_POST['url'];
    
    
    
    $values = "('" . $charName . "', '" . $species . "', '" . $weapon . "', '" . $gender . "', '" . $gemstone . "', '" . $description . "', '" . $picture . "');";
    
    $sql = "INSERT INTO `characters` (`name`, `species`, `weapon`, `gender`, `gemstone`, `Description`, `pictureURL`) 
            VALUES " . $values;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    echo "<script language='javascript'>";
    echo "alert('".$charName." was added!')";
    echo "</script>";
    
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
              <a class="nav-item nav-link" href="admin.php">Admin Access <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link active" href="addChar.php">Add Character</a>
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
            Name: <input type="text" name = "name" id="name"/> </br></br>
            Species: <select name = "species" id="species">
                <option id="">Select One</option>
                <option id="Human" name = "human" >Human</option>
                <option id="Gem" name = "gem" >Gem</option>
                <option id="Other" name = "other" >Other</option>
            </select> </br></br>
            Weapon: <input type="text" name = "weapon"  id="weapon"/> </br></br>
            Gender: <select name = "gender" id="gender">
                <option id="">Select One</option>
                <option id="female" name = "female">Female</option>
                <option id="male" name = "male">Male</option>
                <option id="Other" name = "other">Other</option>
            </select> </br></br>
            Gemstone: <input type="text" name = "gemstone" id="gemstone"/> </br></br>
            Description: <input type="textarea" name = "description" id="description"/> </br></br>
            PictureURL: <input type="text" name = "url" id="url"/> </br></br>
            <input type="submit" name="submit" value="Add Character"/>
        </form>
    </body>
</html>