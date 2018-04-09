<?php
// checks to see if there is a session with the 'isLoggedIn' value
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
  // if there is no session, then redirect to login page
  header("Location: https://{$_SERVER['HTTP_HOST']}/login.php");
  exit();
}
?>
