<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();

  include 'dbconn.php';

  $usedRecipes = [];

  if (isset($_SESSION["userid"])) {
    $follows = $pdo->query("select userIDb from follows where userIDa=".$_SESSION["userid"].";");
    foreach ($follows as $row) {
      $recipes = $pdo->query("select recipeID, recipeName, pictureURL, userID from recipes where userID=".$row["userIDb"]." order by recipeViews");
      foreach ($recipes as $recipeRow) {
        echo $recipeRow["recipeID"].",".$recipeRow["recipeName"].",".$recipeRow["pictureURL"].",";
        $id = $recipeRow["userID"];
        $username = $pdo->query("select displayName from users where userID=".$id.";");
        $username = $username->fetch()["displayName"];
        echo $username.",";
        array_push($usedRecipes, $recipeRow["recipeID"]);
      }
    }
  }

  $recipes = $pdo->query("select recipeID, recipeName, pictureURL, userID from recipes order by uses, recipeViews");
  foreach ($recipes as $row) {
    $used = false;
    foreach ($usedRecipes as $recipeID) {
      if ($recipeID == $row["recipeID"]) {
        $used = true;
      }
    }
    if ($used == false) {
      echo $row["recipeID"].",".$row["recipeName"].",".$row["pictureURL"].",";
      $id = $row["userID"];
      $username = $pdo->query("select displayName from users where userID=".$id.";");
      $username = $username->fetch()["displayName"];
      echo $username.",";
    }
  }

?>
