<!-- So when you search you provide a list of ingredients and a list of tags.
     I want a query that takes those two lists and outputs a list of recipes
     that contain those ingredients and tags -->

<?php
  include 'dbconn.php';

  function query($ingredientList, $tagList) {
    // returns false if the two lists are empty
    if (empty($ingredientList) && empty($tagList)) {
      return false;
    } else { // asuming both lists are non-empty (this does NOT follow
             // from the above code!)
        $stmt1 = 'SELECT DISTINCT recipeID FROM recipes NATURAL JOIN recipe_ingredients NATURAL JOIN ingredients WHERE';
        $stmt2 = 'SELECT DISTINCT recipeID FROM recipies NATURAL JOIN recipe_tags NATURAL JOIN tags WHERE';

        // this and the next statement create the first part of the query.
        for ($i = 1; $i < count($ingredientList) -1; $i++) {
          $stmt1 .= ' ingredientName = ? and';
        }
        // this had to be outside of the loop because we do NOT want the
        // 'and' to be in the last sup-section of the query!
        $stmt1 .= ' ingredientName = ?';

        for ($i = 1; $i < count($tagList) -1; $i++) {
          $stmt2 .= ' tagName = ?';
        }
        // and again this last statement had to be outside of the loop
        $stmt2 .= ' tagName = ?';

        // this loop binds the parameters to $stmt1 query.
        for ($i = 1; $i < count($ingredientList); $i++) {
          $stmt1->bindParam($i, $ingredientList[$i], PDO::PARAM_STR);
        }

        // this loop binds the parameters to $stmt2 query.
        for ($i = 1; $i < count($tagList); $i++) {
          $stmt2->bindParam($i, $tagList[$i], PDO::PARAM_STR);
        }

        $stmtFinal = $stmt1.' INTERSECT '.$stmt2;
        $stmtFinal = $pdo->prepare($stmtFinal);
        return $stmtFinal->execute();
    }
  }
?>
