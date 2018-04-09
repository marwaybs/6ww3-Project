<?php
function getCafe($cafeid){
  try {
    //connecting to database with crendetials
    $servername = "localhost";
    $SQLusername = "root";
    $SQLpassword = "mysql";
    $pdo = new PDO("mysql:host=$servername;dbname=cafeConnect", $SQLusername, $SQLpassword);

    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //query to select all cafes with a specific cafe id
    $stmt = $pdo->query('SELECT * FROM cafe where id =' . $cafeid);

    $cafes = "";
    //inserting the attributes from the database into html to be inserted into the page and to initialize the map
    foreach ($stmt as $row)
    {
        $cafes = $cafes .
        '<!-- div for the description of the cafe and its rating -->
        <div>
          <p>Cafe Name: ' . $row['name'] . '</p>
        </div>
        <!-- picture of the cafe with alternate pictures for different resolutions -->
        <picture>
          <source
            media="(min-width: 650px)"
            srcset="'. $row['image'] .'">
          <img
            src="'. $row['image'] .'"
            alt="A cafe"
            class="largerResponsiveGraphic">
        </picture>

        <!-- video of the cafe in mp4 format -->
        <video class="largerResponsiveGraphic" controls poster="images/coffee2x.png">
          <source src="videos/coffee.mp4"
                  type="video/mp4" />
        </video>

        <!-- javascript for map -->
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkB15KAmjHqlF003jST7mtUIkqNbt-fcI">
        </script>
        <script src="js/maps.js"></script>

        <!-- The location of the cafe -->
        <div id="map"></div>
        <script>
        initMap(individualSampleLocations);
        var cafeLocation = [
          [{lat: ' . $row['latitude'] . ', lng: ' . $row['longitude'] . '}, "<a href=\'individual_sample.php?id=' . $row['id'] . '\'>' . $row['name'] . '</a>"]
        ];
        </script>
        ';
    }

    echo $cafes;
  }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $pdo = null;
}
?>
