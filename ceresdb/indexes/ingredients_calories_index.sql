-- SQL statement to create an index on the calories attribute of the
-- ingredients relation within the Ceres database.
-- Created: 23/04/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
DROP INDEX IF EXISTS ingredients_calories_index ON ingredients;

CREATE INDEX ingredients_calories_index
  USING BTREE
  ON ingredients (calories)
  ALGORITHM = DEFAULT
  LOCK = SHARED;
