-- Please note that this is file should NOT be part of the final Ceres system,
-- it is simply a file for me to de-bug a rather difficult query

SELECT DISTINCT recipeID FROM

(SELECT recipeID FROM recipes NATURAL JOIN recipe_ingredients

  INNER JOIN

  SELECT recipeID FROM recipes NATURAL JOIN
)
