-- SQL statement to create an index on the recipeViews attribute of the
-- recipes relation within the Ceres database.
-- Created: 23/04/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
--DROP INDEX recipies_recipieViews_index ON recipes;

CREATE INDEX recipies_recipieViews_index
  USING BTREE
  ON recipes (recipeViews)
  ALGORITHM = DEFAULT
  LOCK = SHARED;
