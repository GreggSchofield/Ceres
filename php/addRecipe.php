<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();

  $userid = htmlspecialchars($_POST["userid"]);
  $name = htmlspecialchars($_POST["name"]);
  $instructions = htmlspecialchars($_POST["instructions"]);
  $servings = htmlspecialchars($_POST["servings"]);

  include 'dbconn.php';

  $query = "insert into recipes (userID, recipeName, steps, uses, recipeViews, servings, pictureURL) values (".$userid.", ".$name.", ".$instructions.", 0, 0, ".$servings.", '');";
  $stmt = $pdo->query($query);
  $stmt = $pdo->query("select last_insert_id();");
  $id = $stmt->fetch()["last_insert_id()"];
  echo $id;
?>
