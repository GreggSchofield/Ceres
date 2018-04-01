-- SQL statements to insert records into the user_ingredients table of the Ceres database
-- (execute this file to initially populate the database).
-- Created: 19/03/18
-- Author: Gregg Schofield

-- The user_ingredients relation schema has the userID, ingredientID and weighting
-- attributes with character varying, character varying and integer types respectively.

-- comment this command out if you are attempting to create this table for the
-- first time.
DELETE * FROM user_ingredients;

INSERT INTO user_ingredients VALUES ('','',);
