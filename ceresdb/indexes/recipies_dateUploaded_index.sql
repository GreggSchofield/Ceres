-- SQL statement to create an index on the dateUploaded attribute of the
-- recipes relation within the Ceres database.
-- Created: 23/04/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
--DROP INDEX recipies_dateUploaded_index ON recipes;

CREATE INDEX IF EXISTS recipies_dateUploaded_index
  USING BTREE
  ON recipes (dateUploaded)
  ALGORITHM = DEFAULT
  LOCK = SHARED;
