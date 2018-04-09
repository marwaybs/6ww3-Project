<?php
function newReview($cafeid, $rating, $review){
  try {
    $servername = "localhost";
    $SQLusername = "root";
    $SQLpassword = "mysql";
    $pdo = new PDO("mysql:host=$servername;dbname=cafeConnect", $SQLusername, $SQLpassword);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //preparing statement to protect against SQL injections
    $stmt = $pdo->prepare("INSERT INTO review (cafe_id, rating, review) VALUES (:cafeid, :rating, :review)");
    //inserting values into prepared statement
    $stmt->bindValue(':cafeid', $cafeid);
    $stmt->bindValue(':rating', $rating);
    $stmt->bindValue(':review', $review);
    //executing the prepared query
    $stmt->execute();
    }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $pdo = null;
}
?>
