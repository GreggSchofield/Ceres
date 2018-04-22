-- SQL statement to create an index on the protein attribute of the
-- ingredients relation within the Ceres database.
-- Created: 23/04/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
--DROP INDEX ingredients_protein_index ON ingredients;

CREATE INDEX ingredients_protein_index
  USING BTREE
  ON ingredients (protein)
  ALGORITHM = DEFAULT
  LOCK = SHARED;
