-- SQL statement to create an index on the key attribute of the recipies
-- relation within the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
--DROP INDEX recipes_recipieID_index ON recipes;

CREATE INDEX recipes_recipieID_index
  USING HASH
  ON recipes (recipeID)
  ALGORITHM = DEFAULT
  LOCK = SHARED;
