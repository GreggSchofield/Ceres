-- SQL data definition statements for the ingredient_tags table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
DROP TABLE ingredient_tags;

CREATE TABLE ingredient_tags (
	ingredientTagID character varying (10) UNIQUE NOT NULL PRIMARY KEY,
	tagName character varying (32) NOT NULL
);
