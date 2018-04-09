<?php include 'dbReq/checkPassword.php'; ?>
<?php
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $validLogin = checkPassword ($_POST['username'], $_POST['password']);
    if ($validLogin){
      session_start();
      $_SESSION['isLoggedIn'] = true;
      header("Location: http://" . $_SERVER['HTTP_HOST'] . "/submission.php");
      exit();
    } else {
      echo '<p class="updateText">Login Failed :c<p>';
    }
  }
    if (checkPassword($_POST['username'], $_POST['password'])){
      session_start();
      $_SESSION['isLoggedIn'] = true;
      header("Location: http://" . $_SERVER['HTTP_HOST'] . "/submission.php");
      exit();
    }
?>

<!-- specifying that html5 is being used -->
<!DOCTYPE html>
<html>
<?php include 'components/head.inc.php'; ?>

  <!-- a container for all my content where I can use flexbox to organize header, footer, and main content-->
  <div class="wrapper">
    <?php include 'components/header.inc.php'; ?>

    <!-- The main content of the page -->
    <article class="main">
      <!-- form element to collect data from the <input> elements inside of it -->
      <form method="POST" name="login" onsubmit="" action="login.php">
        <p>Login</p>
        Username:<br>
        <!-- creates text input -->
        <input type="text" name="username" >
        <p class="invalidText" id="username">Please enter a username</p>

        Password:<br>
        <!-- creates text input -->
        <input type="password" name="password" >
        <p class="invalidText" id="password">Please enter your password</p>

          <!-- Creating a button to submit the form -->
        <input type="submit" id="login" value="login">
      </form>
    </article>
    <?php include 'components/menu.inc.php'; ?>
    <?php include 'components/footer.inc.php'; ?>
  </div>
</html>
