-- SQL data definition statements for the recipie_ingredients table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
DROP TABLE recipie_ingredients;

CREATE TABLE recipie_ingredients (
	recipieID character varying NOT NULL REFERENCES recipies (recipieID),
	ingredientID character varying (10) NOT NULL REFERENCES ingredients (ingredientID),
	weight integer NOT NULL
);
