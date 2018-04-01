-- SQL statements to insert records into the recipie_ingredients table of the Ceres database
-- (execute this file to initially populate the database).
-- Created: 19/03/18
-- Author: Gregg Schofield

-- The recipie_ingredients relation schema has the recipieID, ingredientID and
-- weight attributes with character varying, character varying and integer
-- types respectively.

-- comment this command out if you are attempting to create this table for the
-- first time.
DELETE * FROM recipie_ingredients;

INSERT INTO recipie_ingredients VALUES ('','',);
