<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();

  $tagList = [];
  $ingredientList = [];
  if (isset($_POST["tags"])) {
    $tags = htmlspecialchars($_POST["tags"]);
    $tagList = explode(";", $tags);
  }
  if (isset($_POST["ingredients"])) {
    $ingredients = htmlspecialchars($_POST["ingredients"]);
    $ingredientList = explode(";", $ingredients);
  }

  include 'query.php';

//  $ingredientList = [1, 2];
//  $tagList = [7, 9];

  $recipeList = query($ingredientList, $tagList);

  /*
  for ($i = 0; $i < count($ingredientList); $i++) {
    echo $ingredientList[$i].",";
  }
  echo " - ";
  for ($i = 0; $i < count($tagList); $i++) {
    echo $tagList[$i].",";
  }
  */

//  echo count($recipeList);

//  foreach ($recipeList as $row) {
//    echo $row["recipeID"].",";
//  }

//  echo $recipeList;

?>
