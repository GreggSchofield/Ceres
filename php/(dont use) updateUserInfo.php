<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();

  $user = htmlspecialchars($_POST["user"]);
  $varName = htmlspecialchars($_POST["varName"]);
  $value = htmlspecialchars($_POST["value"]);

  include 'dbconn.php';

  $query = "update users set ".$varName"=".$value." where userID=".$user.";";
?>
