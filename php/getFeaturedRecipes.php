<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();

//  $name = htmlspecialchars($_POST["name"]);

  include 'dbconn.php';

  $recipes = $pdo->query("select recipeID, recipeName, pictureURL, userID from recipes order by recipeViews");
  foreach ($recipes as $row) {
    echo $row["recipeID"].",".$row["recipeName"].",".$row["pictureURL"].",";
    $id = $row["userID"];
    $username = $pdo->query("select displayName from users where userID=".$id.";");
    $username = $username->fetch()["displayName"];
    echo $username.",";
  }
?>
