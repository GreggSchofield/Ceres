<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();

//  $name = htmlspecialchars($_POST["name"]);

  include 'dbconn.php';

  $recipes = $pdo->query("select recipeID, recipeName from recipes order by recipeViews");
  foreach ($recipes as $row) {
    echo $row["recipeID"].",".$row["recipeName"].",";
  }
?>
