<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  require 'redirect.php';
  startSession();

  $recipeID = htmlspecialchars($_POST["recipe"]);
  $ingredientID = htmlspecialchars($_POST["ingredient"]);
  $weight = htmlspecialchars($_POST["weight"]);

  include 'dbconn.php';

  $stmt = $pdo->query("insert into recipe_ingredients (recipeID, ingredientID, weight) values (".$recipeID.", ".$ingredientID.", ".$weight.")");
  $stmt = $pdo->query("select weighting from ingredients where ingredientID=".$ingredientID);
  $weight = $stmt->fetch()["weighting"];
  $weight += 1;
  $stmt = $pdo->query("update ingredients set weighting=".$weight." where ingredientID=".$ingredientID);
?>
