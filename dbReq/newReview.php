<?php
function newReview($cafeid, $rating, $review){
  try {
    $servername = "localhost";
    $SQLusername = "root";
    $SQLpassword = "mysql";
    $pdo = new PDO("mysql:host=$servername;dbname=cafeConnect", $SQLusername, $SQLpassword);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO review (cafe_id, rating, review) VALUES (:cafeid, :rating, :review)");
    $stmt->bindValue(':cafeid', $cafeid);
    $stmt->bindValue(':rating', $rating);
    $stmt->bindValue(':review', $review);
    $stmt->execute();
    }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $pdo = null;
}
?>
