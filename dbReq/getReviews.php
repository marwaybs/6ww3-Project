<?php
function getReviews($cafeid){
  try {
    //connecting to database with credentials
    $servername = "localhost";
    $SQLusername = "root";
    $SQLpassword = "mysql";
    $pdo = new PDO("mysql:host=$servername;dbname=cafeConnect", $SQLusername, $SQLpassword);

    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //query to select all reviews for a specific cafe
    $stmt = $pdo->query('SELECT * FROM review where cafe_id =' . $cafeid);

    $reviews = "";
    //inserting reviews into html to be inserted into the page
    foreach ($stmt as $row)
    {
        $reviews = $reviews .
        '<div class="review">
          <p>Rating: ' . $row['rating'] . '</p>
          <p>' . $row['review'] . '</p>
          <hr>
        </div>';
    }
    //printing out the reviews on the page
    echo $reviews;
  }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $pdo = null;
}
?>
