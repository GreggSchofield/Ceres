-- SQL statement to create an index on the key attribute of the ingredients
-- relation within the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
--DROP INDEX ingredients_ingredientID_index ON ingredients;

CREATE INDEX ingredients_ingredientID_index
  USING HASH
  ON ingredients (ingredientID)
  ALGORITHM = DEFAULT
  LOCK = SHARED;
