<?php

function determineQuery(){
  //determining which type of search is being used: rating, name or location depending on which $_POST variables are available
  if (isset($_POST['nameSearch'])) {
    return $query = 'SELECT * FROM cafe WHERE name = "' . $_POST['nameSearch'] . '"';

  } else if (isset($_POST['ratingSearch'])) {
    return $query = 'SELECT cafe_id, name, latitude, longitude, image FROM review, cafe HAVING ROUND(AVG(rating), 0) = ' . $_POST['ratingSearch'];

  } else if (isset($_POST['latitude']) && (isset($_POST['longitude']))) {
    return $query = 'SELECT * FROM cafe ORDER BY ABS((' . $_POST["latitude"] . ' - ABS(latitude)) + (' . $_POST["longitude"] . ' - ABS(longitude)))';
  }
  else {
    return $query = 'SELECT * FROM cafe';
  }
}
function cafeSearch(){
  try {
    //database values to connect
    $servername = "localhost";
    $SQLusername = "root";
    $SQLpassword = "mysql";
    //creating a new PDO connection
    $pdo = new PDO("mysql:host=$servername;dbname=cafeConnect", $SQLusername, $SQLpassword);

    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //determining the query to use since there are different search methods
    $query = determineQuery();
    //running the query
    $stmt = $pdo->query($query);

    $cafes = "";

    //inputting the values recieved from the database into html code to be inserted
    foreach ($stmt as $row)
    {
        $cafes = $cafes .

        '<tr>
          <!-- Each column or <th> contains a descriptor of the search result: image, cafe name, or location -->
          <th><img src="' . $row['image'] . '" class="responsiveGraphic" title="cafe image" alt="cafe"/></th>
          <th>
            <!-- <div> for informaiton of cafe` -->
            <div class="sampleResultsDescription">
              <p>Cafe Name: <a href="individual_sample.php?cafeid=' . $row['id'] . '">' . $row['name'] . '</a></p>
            </div>
          </th>
        </tr>';
        $mapLocations = $mapLocations . '
          [{lat: ' . $row['latitude'] . ', lng: ' . $row['longitude'] . '}, "<a href=\'individual_sample.php?id=' . $row['id'] . '\'>' . $row['name'] . '</a>"],
          ';
    }

    //echoing out the list of cafes and the javascript to initialize the map with all of the locations
    echo '<table>' . $cafes .  '</table>' .
    '<script>
        var cafeLocations = [
          ' . $mapLocations . '
        ];
        initMap(cafeLocations);
        </script>'
    ;
  }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $pdo = null;
}
?>
