<?php
function newCafe($imageURL, $videoURL){
  try {

    //connecting to database with credentials
    $servername = "localhost";
    $SQLusername = "root";
    $SQLpassword = "mysql";
    $pdo = new PDO("mysql:host=$servername;dbname=cafeConnect", $SQLusername, $SQLpassword);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //preparing a statement to protect against SQL injections
    $stmt = $pdo->prepare("INSERT INTO cafe (name, latitude, longitude, image, video) VALUES (:cafeName, :latitude, :longitude, :imageURL, :videoURL)");
    //inserting values into prepared statement
    $stmt->bindValue(':cafeName', $_POST['cafeName']);
    $stmt->bindValue(':latitude', $_POST['latitude']);
    $stmt->bindValue(':longitude', $_POST['longitude']);
    $stmt->bindValue(':imageURL', $imageURL);
    $stmt->bindValue(':videoURL', $videoURL);
    //executing prepared statement
    $stmt->execute();
    }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $pdo = null;
}
?>
