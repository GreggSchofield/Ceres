<?php

  /*
  So when you search you provide a list of ingredients and a list of tags.
       I want a query that takes those two lists and outputs a list of recipes
       that contain those ingredients and tags
 */

  function query($ingredientList, $tagList) {
    // returns false if the two lists are empty
    if (empty($ingredientList) && empty($tagList)) {
      return false;
    } else { // asuming both lists are non-empty (this does NOT follow
             // from the above code!)
        $stmt1 = 'SELECT DISTINCT recipeID FROM recipes NATURAL JOIN recipe_ingredients NATURAL JOIN ingredients WHERE';
        $stmt2 = 'SELECT DISTINCT recipeID FROM recipes NATURAL JOIN recipe_tags NATURAL JOIN tags WHERE';
        // this and the next statement create the first part of the query.
        for ($i = 0; $i < count($ingredientList); $i++) {
          $stmt1 .= ' ingredientID = '.$ingredientList[$i];
          if ($i < count($ingredientList) - 1) {
            $stmt1 .= ' and';
          }
        }
        // this had to be outside of the loop because we do NOT want the
        // 'and' to be in the last sup-section of the query!
//        $stmt1 .= ' ingredientID = ?';

        for ($i = 0; $i < count($tagList); $i++) {
          $stmt2 .= ' tagID = '.$tagList[$i];
          if ($i < count($tagList) - 1) {
            $stmt2 .= ' and';
          }
        }
        // and again this last statement had to be outside of the loop
//        $stmt2 .= ' tagID = ?';

        include 'dbconn.php';

        $stmtFinal = $stmt1.' INTERSECT '.$stmt2;
        $stmtFinal .= ";";
        $stmtFinal = $pdo->prepare($stmtFinal);
        echo $stmtFinal;
//        return $stmtFinal->execute();
    }
  }
?>
