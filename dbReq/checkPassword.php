<?php
function checkPassword($username, $password){
  try {
    //connecting to database with credentials
    $servername = "localhost";
    $SQLusername = "root";
    $SQLpassword = "mysql";
    $pdo = new PDO("mysql:host=$servername;dbname=cafeConnect", $SQLusername, $SQLpassword);

      // set the PDO error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //query to check if username and password are present in the database
      $stmt = $pdo->query('SELECT * FROM user WHERE username = "'. $username .'" and password = SHA2(CONCAT("'. $password .'", "4b3403665fea6"), 0)');
      //if row count is equal to one, then the user exists and should be allowed to login
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
