<?php include 'components/loggedInCheck.inc.php' ?>
<!-- specifying that html5 is being used -->
<!DOCTYPE html>
<html>
<?php include 'components/head.inc.php'; ?>

  <!-- a container for all my content where I can use flexbox to organize header, footer, and main content-->
  <div class="wrapper">
    <?php include 'components/header.inc.php'; ?>

    <!-- The main content of the page -->
    <article class="main" id="indexMain">
      <!-- paragraph of what the site is about -->
      <p>This is a private page! Proof you are logged in! :D</p>
      <!-- A decorative picture of two sizes using hte picture tag -->
      <picture class="indexCoffee">
        <!-- An alternative picture for higher resolution displays -->
        <source
          media="(min-width: 900px)"
          srcset="images/coffee2x.png">
          <!-- The default iage and its source -->
        <img
          class="indexCoffee"
          src="images/coffee1x.png"
          alt="Coffee Cup">
      </picture>
    </article>
    <?php include 'components/menu.inc.php'; ?>
    <?php include 'components/footer.inc.php'; ?>
  </div>
</html>
