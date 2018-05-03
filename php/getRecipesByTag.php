<?php
  require_once 'sessionCookieHandlerLib.php';
  require_once 'queryLib.php';
  require_once 'userCredentialsValidationLib.php';
  startSession();

  $tagList = array();
  $ingredientList = array();
  if (isset($_POST["tags"])) {
    $tags = htmlspecialchars($_POST["tags"]);
    $tagList = explode(";", $tags);
  }
  if (isset($_POST["ingredients"])) {
    $ingredients = htmlspecialchars($_POST["ingredients"]);
    $ingredientList = explode(";", $ingredients);
  }

//  $ingredientList = [1, 2];
//  $tagList = [7, 9];

  $finalRecipesList = array();

  include 'dbconn.php';

  if (count($tagList) > 0) {
    $tempRecipeList = $pdo->query("select distinct recipeID from recipe_tags where tagID=".$tagList[0].";");
    foreach ($tempRecipeList as $tempRecipe) {
      array_push($finalRecipesList, (int)$tempRecipe["recipeID"]);
    }
  }

  if (count($tagList) > 0) {
    foreach ($tagList as $tempTag) {
      $tempRecipeListQuery = $pdo->query("select distinct recipeID from recipe_tags where tagID=".(int)$tempTag.";");
      $tempRecipeList = array();
      foreach ($tempRecipeListQuery as $tempRecipe) {
        array_push($tempRecipeList, $tempRecipe["recipeID"]);
      }
      foreach ($finalRecipesList as $id) {
        if (!in_array($id, $tempRecipeList)) {
          if (($key = array_search($id, $finalRecipesList)) !== false) {
              array_splice($finalRecipesList, $key, 1);
          }
        }
      }
    }
  }

  if (count($ingredientList) > 0) {
    if (count($finalRecipesList) == 0) {
      $tempRecipeList = $pdo->query("select distinct recipeID from recipe_ingredients where ingredientID=".$ingredientList[0].";");
      foreach ($tempRecipeList as $tempRecipe) {
        array_push($finalRecipesList, (int)$tempRecipe["recipeID"]);
      }
    }
    foreach ($ingredientList as $tempIngredient) {
      $tempRecipeListQuery = $pdo->query("select distinct recipeID from recipe_ingredients where ingredientID=".(int)$tempIngredient.";");
      $tempRecipeList = [];
      foreach ($tempRecipeListQuery as $tempRecipe) {
        array_push($tempRecipeList, $tempRecipe["recipeID"]);
      }
      foreach ($finalRecipesList as $id) {
        if (!in_array($id, $tempRecipeList)) {
          if (($key = array_search($id, $finalRecipesList)) !== false) {
              array_splice($finalRecipesList, $key, 1);
          }
        }
      }
    }
  }

  for ($i = 0; $i < count($finalRecipesList); $i++) {
    $tempRecipe = $pdo->query("select distinct recipeID, recipeName, pictureURL, userID from recipes where recipeID=".$finalRecipesList[$i].";");
    $tempRecipe = $tempRecipe->fetch();
    echo $tempRecipe["recipeID"].",".$tempRecipe["recipeName"].",".$tempRecipe["pictureURL"].",".$tempRecipe["userID"].",";
  }

?>
