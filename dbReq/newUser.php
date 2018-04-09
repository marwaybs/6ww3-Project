<!-- Havent tested yet -->

<?php
function newUser(){
  try {
    $servername = "localhost";
    $SQLusername = "root";
    $SQLpassword = "mysql";
    $pdo = new PDO("mysql:host=$servername;dbname=cafeConnect", $SQLusername, $SQLpassword);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("INSERT INTO user (username, birthday, happiness, email, password, visit_freq, cafe_order, other_order, salt)
     VALUES (:username, :birthday, :happiness, :email, SHA2(CONCAT(:password, '4b3403665fea6'), 0), :visit_freq, :cafe_order, :other_order, '4b3403665fea6')");


    $stmt->bindValue(':username', $_POST['username']);
    $stmt->bindValue(':birthday', $_POST['birthday']);
    $stmt->bindValue(':hapiness', $_POST['happiness']);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':vist', $videoURL);
    $stmt->execute();
    }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $pdo = null;
}
?>
