<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();

  $name = htmlspecialchars($_POST["name"]);

  include 'dbconn.php';

  $stmt = $pdo->query("select tagID from tags where tagName=".$name);
  echo $stmt->fetch()["tagID"];
?>
