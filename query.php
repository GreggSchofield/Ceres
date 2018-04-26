<!-- Hey Jack, take a look at this, I think this is almost there -->

<?php
  function query($ingredientList, $tagList) {
    // returns false if the two lists are empty
    if (empty($ingredientList) && empty($tagList)) {
      return false;
    } else { // asuming both lists are non-empty (this does NOT follow
             // from the above code!)
        $stmt = 'SELECT DISTINCT recipeID FROM recipes WHERE';

        // this and the next statement create the first part of the query.
        for ($i = 1; $i < count($ingredientList) -1; $i++) {
          $stmt .= ' ingredientName = ? and';
        }
        // this had to be outside of the loop because we do NOT want the
        // 'and' to be in the last sup-section of the query!
        $stmt .= ' ingredientName = ?';

        for ($i = 1; $i < count($tagList) -1; $i++) {
          $stmt .= ' ';
        }

        // this loop binds the parameters to the query.
        for ($i = 1; $i < count($ingredientList); $i++) {
          $stmt->bindParam($i, $ingredientList[$i], PDO::PARAM_STR);
        }

        // this loop binds the parameters to the query.
        for ($i = 1; $i < count($tagList); $i++) {
          $stmt->bindParam($i, $ingredientList[$i], PDO::PARAM_STR);
        }

        $stmt = $pdo->prepare($stmt);
        $stmt->execute();
    }
  }
?>
