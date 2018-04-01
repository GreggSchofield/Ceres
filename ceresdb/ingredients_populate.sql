-- SQL statements to insert records into the ingredients table of the Ceres database
-- (execute this file to initially populate the database).
-- Created: 19/03/18
-- Author: Gregg Schofield

-- The ingredients relation schema has the ingredientID, ingredientName, calories,
-- protein, fat, sugar, fiber, carbohydrates, contentTags and weighting attributes
-- with character varying, character varying, real, real, real, real,reak, reak,
-- character varying and real types respectively.

-- comment this command out if you are attempting to populate this table for the
-- first time.
DELETE * FROM ingredients;

INSERT INTO ingredients VALUES ('','',,,,,,,'',);
