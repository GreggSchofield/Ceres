<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  startSession();
  $_SESSION = array();
  header("Location: homepage.php");
  die();
?>
