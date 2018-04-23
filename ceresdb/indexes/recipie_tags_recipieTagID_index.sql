-- SQL statement to create an index on the key attribute of the recipes
-- relation within the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time:
--DROP INDEX recipie_tags_ingredientID_index ON recipe_tags;

CREATE INDEX IF EXISTS recipie_tags_ingredientID_index
  USING HASH
  ON recipe_tags (recipeTagID)
  ALGORITHM = DEFAULT
  LOCK = SHARED;
