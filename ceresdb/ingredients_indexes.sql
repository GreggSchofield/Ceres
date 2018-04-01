-- SQL statements to create indexes on a subset of attributes of the ingredients relation
-- within the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this index for the
-- first time.
DROP INDEX ingredients_index;

CREATE INDEX ingredients_index ON ingredients USING HASH (ingredientID);
