<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();

  $recipe = htmlspecialchars($_POST["recipe"]);
  $comment = htmlspecialchars($_POST["comment"]);
  $userid = $_SESSION["userid"];

  include 'dbconn.php';

  $query = "insert into reviews (userID, recipeID, reviewText) values (".$userid.", ".$recipe.", '".$comment."')";
  $pdo->query($query);
  echo $query;

?>
