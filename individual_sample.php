<?php include 'dbReq/getcafe.php' ?>
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
      <?php getCafe($_GET['cafeid']); ?>

      <div id="reviewform">
      <p>Rating: <input id="rating" name="rating" type="number" min="0" max="5" /></p>
      <p>Review: <textarea id="review" name="review" rows="5" cols="40"></textarea></p>
      <p><button onclick=<?php echo 'submitReviewForm("' . $_GET['cafeid'] . '");' ?>
        >Submit review</button></p>
      <div id="errorplaceholder"></div>
      </div>

      <!-- List of reviews for the cafe's wifi -->
      <div id="reviews">
        <?php getReviews($_GET['cafeid']) ?>

      </div>
    </article>
    <?php include 'components/menu.inc.php'; ?>
    <?php include 'components/footer.inc.php'; ?>
  </div>
  <script type="text/javascript" src="ajax/ajax.js"></script>
</html>
