<?php

function determineQuery(){
  if (isset($_POST['nameSearch'])) {
    return $query = 'SELECT * FROM cafe WHERE name = "' . $_POST['nameSearch'] . '"';

  } else if (isset($_POST['ratingSearch'])) {
    return $query = 'SELECT cafe_id, name, latitude, longitude, image FROM review, cafe GROUP BY cafe_id HAVING ROUND(AVG(rating), 0) = ' . $_POST['ratingSearch'];

  } else if (isset($_POST['latitude']) && (isset($_POST['longitude']))) {
    return $query = 'SELECT * FROM cafe ORDER BY ABS((' . $_POST["latitude"] . ' - ABS(latitude)) + (' . $_POST["longitude"] . ' - ABS(longitude)))';
  }
  else {
    return $query = 'SELECT * FROM cafe';
  }
}
function cafeSearch(){
  try {

    $servername = "localhost";
    $SQLusername = "root";
    $SQLpassword = "mysql";
    $pdo = new PDO("mysql:host=$servername;dbname=cafeConnect", $SQLusername, $SQLpassword);

    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = determineQuery();
    $stmt = $pdo->query($query);

    $cafes = "";

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
    }

    echo '<table>' . $cafes .  '</table>';
  }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $pdo = null;
}
?>
