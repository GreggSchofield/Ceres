<?php
  $recipeID = htmlspecialchars($_POST["recipe"]);
  $ingredientID = htmlspecialchars($_POST["ingredient"]);
  $weight = htmlspecialchars($_POST["weight"]);

  include 'dbconn.php';

  $stmt = $pdo->query("insert into recipe_ingredients (recipeID, ingredientID, weight) values (".$recipeID.", ".$ingredientID.", ".$weight.")");
?>
