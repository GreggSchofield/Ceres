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

  if (isset($_SESSION["userid"])) {
    $followedRecipesList = array();
    for ($i = 0; $i < count($finalRecipesList); $i++) {
      $userID = $pdo->query("select userID from recipes where recipeID=".$finalRecipesList[$i].";");
      $userID = $userID->fetch()["userID"];
      $follows = $pdo->query("select userIDb from follows where userIDa=".$_SESSION["userid"]." and userIDb=".$userID.";");
      $follows = $follows->fetch()["userIDb"];
      if (count($follows) > 0) {
        array_push($followedRecipesList, $finalRecipesList[$i]);
        array_splice($finalRecipesList, $i, 1);
        $i--;
      }
    }
    foreach ($finalRecipesList as $id) {
      array_push($followedRecipesList, $id);
    }
    $finalRecipesList = array();
    foreach ($followedRecipesList as $id) {
      array_push($finalRecipesList, $id);
    }
  }

  for ($i = 0; $i < count($finalRecipesList); $i++) {
    $tempRecipe = $pdo->query("select distinct recipeID, recipeName, pictureURL, userID from recipes where recipeID=".$finalRecipesList[$i].";");
    $tempRecipe = $tempRecipe->fetch();
    $username = $pdo->query("select displayName from users where userID=".$tempRecipe["userID"].";");
    $username = $username->fetch()["displayName"];
    echo $tempRecipe["recipeID"].",".$tempRecipe["recipeName"].",".$tempRecipe["pictureURL"].",".$username.",";
  }

?>
