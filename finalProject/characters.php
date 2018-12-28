<?php include 'inc/functions.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <Title>Steven Universe Wiki - Characters</Title>
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
              <a class="nav-item nav-link active" href="characters.php">Characters</a>
              <a class="nav-item nav-link" href="fusions.php">Fusions</a>
              <a class="nav-item nav-link" href="locations.php">Locations</a>
            </div>
          </div>
          <nav class="navbar navbar-light bg-inverse">
          <form class="form-inline" action="login.php">
            <button class="btn btn-outline-success" type="submit">Admin Login</button>
          </form>
          </nav>
        </nav>
        <script>
  	      $('document').ready(function() {
  	          $('.charLink').click(function() {
  	              $.ajax({
                      type: "GET",
                      url: "api.php",
                      dataType: "json",
                      data: { "id": $(this).attr('id') },
                      success: function(data, status) {
                          $("#description").html(data.Description);
          	              console.log(data.Description);

                      }
                      
  	          }); // ajax closing
  	          
  	          }); // petlink click
  	          
  	      }); // doc end
  	  </script>
        <center>
          <h1>SORT AND FILTER CHARACTERS</h1>
          <form method="GET">
            <b>Order By Name:</b>
            A-Z <input type="radio" name="orderBy" value="az">
            Z-A <input type="radio" name="orderBy" value="za">
            </br></br>
            
            <b>Filter by:</b></br>
            Species</br>
            Human <input type="radio" name="species" value="Human"/>
            Gem <input type="radio" name="species" value="Gem"/>
            Other <input type="radio" name="species" value="Half human, half gem"/>
            </br>
            Gender</br>
            Female <input type="radio" name="gender" value="Female"/>
            Male <input type="radio" name="gender" value="Male"/>
            </br></br>
            <input type="submit" name="submit" value="Search!"/>
          </form>
          </br></br>
          <table>
            <colgroup>
              <col style="width:100px">
              <col style="width:100px">
              <col style="width:500px">
            </colgroup> 
            <tbody>
              <tr>
                <th style="text-align:center;font-size:25px">Name</th>
                <th style="text-align:center;font-size:25px">Image</th>
                <th style="text-align:center;font-size:25px">Description</th>
              </tr>
              <?php
                  if($_GET['submit'] == "Search!") {
                      filterChars();
                  }
              ?>
            </tbody>
          </table>
        </center>
        </br></br>
    </body>
</html>