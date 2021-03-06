-- SQL statement to create an index on the sugar attribute of the
-- ingredients relation within the Ceres database.
-- Created: 23/04/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
--DROP INDEX ingredients_sugar_index ON ingredients;

CREATE INDEX IF EXISTS ingredients_sugar_index
  USING BTREE
  ON ingredients (sugar)
  ALGORITHM = DEFAULT
  LOCK = SHARED;
