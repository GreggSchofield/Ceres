<?php
  $name = htmlspecialchars($_GET["name"]);
  $calories = htmlspecialchars($_GET["calories"]);
  $protein = htmlspecialchars($_GET["protein"]);
  $fat = htmlspecialchars($_GET["fat"]);
  $sugar = htmlspecialchars($_GET["sugar"]);
  $fiber = htmlspecialchars($_GET["fiber"]);
  $carbs = htmlspecialchars($_GET["carbs"]);
  $contents = htmlspecialchars($_GET["contents"]);

  include 'dbconn.php';

  $stmt = $pdo->query("insert into ingredients (ingredientName, calories, protein, fat, sugar, fiber, carbohydrates, contentTags, weighting) values (".$name.", ".$calories.", ".$protein.", ".$fat.", ".$sugar.", ".$fiber.", ".$carbs.", ".$contents.", 1)");
?>
