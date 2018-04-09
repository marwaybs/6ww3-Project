
<?php
include "validation/validation.php";

function newUser(){
  try {
    if (!validateEmail($_POST['email']) || !validateDate($_POST['birthday'])) {
      echo "Invalid Input";
    }else {
      //connecting to database
      $servername = "localhost";
      $SQLusername = "root";
      $SQLpassword = "mysql";
      $pdo = new PDO("mysql:host=$servername;dbname=cafeConnect", $SQLusername, $SQLpassword);
      // set the PDO error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //preparing statement to insert a user
      $stmt = $pdo->prepare("INSERT INTO user (username, birthday, email, password, salt)
       VALUES (:username, :birthday, :email, SHA2(CONCAT(:password, '4b3403665fea6'), 0), '4b3403665fea6')");
       //inputting values into prepared statement
      $stmt->bindValue(':username', $_POST['username']);
      $stmt->bindValue(':birthday', $_POST['birthday']);
      $stmt->bindValue(':password', $_POST['password']);
      $stmt->bindValue(':email', $_POST['email']);

      //executing prepared statement
      $stmt->execute();

      //printing out a confirmation that you are now registered
      echo '<p class="updateText">You are now registered!<p>';
      }

    }
  catch(PDOException $e)
      {
      echo $sql . "<br>" . $e->getMessage();
      }

  $pdo = null;

}
?>
