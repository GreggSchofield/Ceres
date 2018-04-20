<?php
  $recipeID = htmlspecialchars($_POST["recipe"]);
  $tagID = htmlspecialchars($_POST["tag"]);

  include 'dbconn.php';

  $stmt = $pdo->query("insert into recipe_tags (recipeID, tagID) values (".$recipeID.", ".$tagID.")");
?>
