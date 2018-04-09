<?php
function checkPassword($username, $password){
  try {

    $servername = "localhost";
    $SQLusername = "root";
    $SQLpassword = "mysql";
    $pdo = new PDO("mysql:host=$servername;dbname=cafeConnect", $SQLusername, $SQLpassword);

      // set the PDO error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $pdo->query('SELECT * FROM user WHERE username = "'. $username .'" and password = SHA2(CONCAT("'. $password .'", "4b3403665fea6"), 0)');
      // SELECT * FROM user WHERE username = 'monkey' and password = SHA2(CONCAT('cat', "4b3403665fea6"), 0)

      return $stmt->rowCount() === 1;

      }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $pdo = null;
}

// echo checkPassword ("mosdfsdnkey", "cat");
?>
