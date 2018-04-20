<?php
  $name = htmlspecialchars($_POST["name"]);
  $calories = htmlspecialchars($_POST["calories"]);
  $protein = htmlspecialchars($_POST["protein"]);
  $fat = htmlspecialchars($_POST["fat"]);
  $sugar = htmlspecialchars($_POST["sugar"]);
  $fiber = htmlspecialchars($_POST["fiber"]);
  $carbs = htmlspecialchars($_POST["carbs"]);
  $contents = htmlspecialchars($_POST["contents"]);

  include 'dbconn.php';

  $stmt = $pdo->query("insert into ingredients (ingredientName, calories, protein, fat, sugar, fiber, carbohydrates, contentTags, weighting) values (".$name.", ".$calories.", ".$protein.", ".$fat.", ".$sugar.", ".$fiber.", ".$carbs.", ".$contents.", 1)");
?>
