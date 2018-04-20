<!DOCTYPE html>
<html>
	<head>
  </head>
  <body>
		<?php
    $recipe = htmlspecialchars($_GET["recipe"]);

    include 'dbconn.php';

    $stmt = $pdo->query("select userID, recipeName, dateUploaded, steps, uses, recipeViews, servings from recipes where recipeID=".$recipe.";");

    $row = $stmt->fetch();

    $userID = $row["userID"];
    $recipeName = $row["recipeName"];
    $dateUploaded = $row["dateUploaded"];
    $steps = $row["steps"];
    $uses = $row["uses"];
    $recipeViews = $row["recipeViews"];
    $servings = $row["servings"];
    $totalCalories = 0;

    $recipeViews += 1;

    $stmt = $pdo->query("select displayName from users where userID=".$userID.";");
    $username = $stmt->fetch()["displayName"];

    $stmt = $pdo->query("select displayName from users where userID=".$userID.";");

    $stmt = $pdo->query("update recipes set recipeViews=".$recipeViews." where recipeID=".$recipe.";");

    echo "<h1>".$recipeName." - serves ".$servings."</h1>\n";
    echo "<p>Uploaded by ".$username." on ".$dateUploaded."</p>\n";
    echo "<p>Views: ".$recipeViews." Uses: ".$uses."</p>\n";
    echo "<h3>Ingredients:</h3>\n";
    $stmt = $pdo->query("select ingredientID, weight from recipe_ingredients where recipeID=".$recipe.";");
    foreach ($stmt as $row) {
      $ingredient = $pdo->query("select ingredientName, calories from ingredients where ingredientID=".$row["ingredientID"].";");
      $ingredient = $ingredient->fetch();
      $ingName = $ingredient["ingredientName"];
      $calories = $ingredient["calories"];
      $weight = $row["weight"];
      $totalCalories += ($calories * $weight);
      echo "<p>".$ingName." - ".$weight."g</p>\n";
    }

    $totalCalroies /= $servings;

    echo "<b>".$totalCalories." calories per serving</b>\n<br><br>\n";

    echo "<h3>Steps:</h3>\n<p style='white-space: pre-line'>".$steps."</p>\n";

		?>
  </body>
</html>
