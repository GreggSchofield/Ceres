-- SQL data definition statements for the recipie_ingredients table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
--DROP TABLE recipie_ingredients;

CREATE TABLE IF NOT EXISTS recipie_ingredients (
	recipieID VARCHAR (10) NOT NULL REFERENCES recipies (recipieID),
	ingredientID VARCHAR (10) NOT NULL REFERENCES ingredients (ingredientID),
	weight FLOAT NOT NULL
);
