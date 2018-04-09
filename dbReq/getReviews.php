<?php
function getReviews($cafeid){
  try {

    $servername = "localhost";
    $SQLusername = "root";
    $SQLpassword = "mysql";
    $pdo = new PDO("mysql:host=$servername;dbname=cafeConnect", $SQLusername, $SQLpassword);

    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->query('SELECT * FROM review where cafe_id =' . $cafeid);

    $reviews = "";

    foreach ($stmt as $row)
    {
        $reviews = $reviews .
        '<div class="review">
          <p>Rating: ' . $row['rating'] . '</p>
          <p>' . $row['review'] . '</p>
          <hr>
        </div>';
    }

    return $reviews;
  }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $pdo = null;
}
// getReviews("1");
?>
