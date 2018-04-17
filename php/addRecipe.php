<?php
  $name = htmlspecialchars($_GET["name"]);
  $instructions = htmlspecialchars($_GET["instructions"]);

  include 'dbconn.php';

  $stmt = $pdo->query("insert into recipe (userID, recipeName, dateUploaded, steps, uses, recipeViews, tags, servings)");
//  $stmt = $pdo->query("select last_insert_id();");
//  echo $stmt->fetch("recipeID");
?>
