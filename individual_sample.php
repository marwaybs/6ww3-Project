<?php include 'dbReq/getReviews.php' ?>

<!-- specifying that html5 is being used -->
<!DOCTYPE html>
<html>
<?php include 'components/head.inc.php'; ?>

  <!-- a container for all my content where I can use flexbox to organize header, footer, and main content-->
  <div class="wrapper">
    <?php include 'components/header.inc.php'; ?>

    <!-- The main content of the page -->
    <article class="main">
      <!-- div for the description of the cafe and its rating -->
      <div>
        <p>Cafe Name: Finch Avenue Cafe</p>
        <p>Wifi Rating: 5</p>
        <p>Number of ratings: 42</p>
      </div>
      <!-- picture of the cafe with alternate pictures for different resolutions -->
      <picture>
        <source
          media="(min-width: 650px)"
          srcset="images/cafe2x.jpg">
        <img
          src="images/cafe1x.jpg"
          alt="A cafe"
          class="largerResponsiveGraphic">
      </picture>

      <!-- video of the cafe in mp4 format -->
      <video class="largerResponsiveGraphic" controls poster="images/coffee2x.png">
        <source src="videos/coffee.mp4"
                type='video/mp4' />
      </video>

      <!-- javascript for map -->
      <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkB15KAmjHqlF003jST7mtUIkqNbt-fcI">
      </script>
      <script src="js/maps.js"></script>

      <!-- The location of the cafe -->
      <div id="map"></div>
      <script>
      initMap(individualSampleLocations);
      </script>


      <!-- List of reviews for the cafe's wifi -->
      <div id="reviews">
        <?php ?>

      </div>
    </article>
    <?php include 'components/menu.inc.php'; ?>
    <?php include 'components/footer.inc.php'; ?>
  </div>
</html>
