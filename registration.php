<?php include 'dbReq/newUser.php' ?>
<?php
  if (isset($_POST['username'])) {
    newUser();
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
      <form method="POST" action="registration.php" name="registrationForm" onsubmit="return validateRegistration()">
        <p>Registration</p>
        Username:<br>
        <!-- creates text input -->
        <input type="text" name="username" >
        <p class="invalidText" id="username">Please enter a username</p>

        Birthday [dd/mm/yyyy or dd-mm-yyyy format]:<br>
        <!-- creates text input -->
        <input type="text" name="birthday" >
        <p class="invalidText" id="birthday">Please enter your birthday</p>

        How happy are you?<br>
        <!-- Number input -->
        <input type="" name="happy" >
        <p class="invalidText" id="happy">Please enter a number equaling your happiness</p>

        Email:<br>
        <!-- creates text input -->
        <input type="text" name="email" >
        <p class="invalidText" id="email">Please enter a valid email</p>

        Password:<br>
        <!-- creates password input with the text appearing as *** -->
        <input type="password" name="password" >
        <p class="invalidText" id="password">Please enter a password</p>

        Repeat Password:<br>
        <input type="password" name="repeatedPassword" >
        <p class="invalidText" id="repeatedPassword">Both password fields must match</p>

        <p>How often do you visit cafes?</p>
        <!-- radiobuttons where only one button can be pressed at a time -->
        <div class="radioButtons">
          <input type="radio" name="visitFrequency" value="0"> 0<br>
          <input type="radio" name="visitFrequency" value="1-3"> 1-3<br>
          <input type="radio" name="visitFrequency" value="4-5"> 4-5<br>
          <input type="radio" name="visitFrequency" value="6+"> 6+<br>
        </div>
        <p class="invalidText" id="visitFrequency">Please pick a frequency</p>

        <p>What do you order at cafes?</p>
        <!-- checkboxes where many boxes can be pressed at once and all checked boxes are recorded -->
        <div class="checkboxes">
          <input type="checkbox" name="beverageCheck" value="beverage">Beverage<br>
          <input type="checkbox" name="order" value="pastry" >Pastry<br>
          <input type="checkbox" name="order" value="fullMeal" >Full Meal<br>
        </div>
        <br>
        <!-- A resizable textarea that takes a larger amount of text than a text input -->
        <p>Other:<p>
          <textarea rows="5" cols="50" placeholder="What else do you order at cafes?"></textarea>
          <br>
          <!-- Creating a button to submit the form -->
        <input type="submit" id="registrationSubmit" value="Submit">
      </form>
    </article>
    <?php include 'components/menu.inc.php'; ?>
    <?php include 'components/footer.inc.php'; ?>
  </div>
  <script type="text/javascript" src="js/validation.js"></script>
</html>
