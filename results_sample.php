<!-- specifying that html5 is being used -->
<!DOCTYPE html>
<html>
<?php include 'components/head.inc.php'; ?>
<?php include 'dbReq/cafeSearch.php'; ?>

  <!-- a container for all my content where I can use flexbox to organize header, footer, and main content-->
  <div class="wrapper">
    <?php include 'components/header.inc.php'; ?>

    <!-- The main content of the page -->

    <article class="main fitGraphics" >
      <p>Search Results</p>
      <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkB15KAmjHqlF003jST7mtUIkqNbt-fcI">
      </script>
      <script src="js/maps.js"></script>

      <!-- The location of the cafe -->
      <div id="map"></div>
      <script>
      initMap(resultsSampleLocations);
      </script>
      <!-- Creating a table element to show search results -->
      <table id="searchResults">
        <?php
        cafeSearch();
        ?>


      </table>
    </article>
    <?php include 'components/menu.inc.php'; ?>
    <?php include 'components/footer.inc.php'; ?>
  </div>
</html>
