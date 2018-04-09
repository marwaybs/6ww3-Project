<?php include 'dbReq/newCafe.php' ?>
<?php include 'upload/submitFile.php' ?>

<?php
  if (isset($_FILES['cafeImage'])) {
    $imageURL = submitFile($_FILES);
    newCafe($imageURL, "VIDEOURL");
    echo '<p class="updateText">Cafe Submitted!<p>';
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
      <!-- creating a form to collect information about a cafe to submit it -->
      <form method="POST" action="submission.php" enctype="multipart/form-data">
        Cafe Name:<br>
        <!-- text input of a cafe's name -->
        <input type="text" name="cafeName" required>
        <br>
        Latitude:<br>
        <!-- Placeholder location text input -->
        <input type="text" name="latitude" required>
        <br>
        Longitude:<br>
        <!-- Placeholder location text input -->
        <input type="text" name="longitude" required>
        <br>
        <!-- input to upload image of a cafe, accepts all image types currently -->
        Upload Image:
        <input type="file" name="cafeImage" accept="image/*" required>
        <br>
        Upload Video (optional):
        <!-- input to upload video, accepts all video types currently -->
        <input type="file" name="video" accept="video/*" >
        <br>
        <!-- to submit the form to submit a new cafe -->
        <input type="submit" value="Submit">
      </form>

    </article>
    <?php include 'components/menu.inc.php'; ?>
    <?php include 'components/footer.inc.php'; ?>
  </div>
</html>
