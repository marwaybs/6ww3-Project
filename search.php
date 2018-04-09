<!-- specifying that html5 is being used -->
<!DOCTYPE html>
<html>
<?php include 'components/head.inc.php'; ?>

  <!-- a container for all my content where I can use flexbox to organize header, footer, and main content-->
  <div class="wrapper">
    <?php include 'components/header.inc.php'; ?>

    <!-- The main content of the page -->
    <article class="main">
      <!-- creating a form to collect the cafe's name to search by -->
      <!-- The action will contain where the page the form information will be sent. Currently non-functional -->
      <form method="POST" action="results_sample.php">
        Search by Name:<br>
        <!-- collected cafe's name -->
        <input type="text" name="nameSearch">
        <br>
        <!-- submit button to search by name -->
        <input type="submit" value="Submit">
      </form>
      <br>
      <!-- creating a form to collect the rating of cafe's to search by -->
      <form method="POST" action="results_sample.php">
        Search by rating:<br>
        <!-- giving rating options from 1-5 for a user to pick from as a drop down menu -->
        <select name="ratingSearch">
          <!-- Each option has a value that is the data the user is selecting and the text that is displayed for the user -->
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        <br>
        <!-- submit button to search by rating -->
         <input type="submit" value="Submit">
      </form>
      <br>
      <form method="POST" action="results_sample.php">
        Search by location:
        <!-- collected cafe's name -->
        <p>Latitude:</p><input type="number" name="latitude">
        <p>Longitude:</p><input type="number" name="longitude">
        <br>
        <!-- submit button to search by rating -->
         <input type="submit" value="Submit">
      </form>

    </article>
    <?php include 'components/menu.inc.php'; ?>
    <?php include 'components/footer.inc.php'; ?>
  </div>
  <script src="js/getCurrentLocation.js"> </script>
</html>
