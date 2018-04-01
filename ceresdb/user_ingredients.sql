-- SQL data definition statements for the user_ingredients table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
DROP TABLE user_ingredients;

CREATE TABLE user_ingredients (
	userID character varying (10) NOT NULL REFERENCES users (userID),
	ingredientID character varying (10) NOT NULL REFERENCES ingredients (ingredientID),
	weighting integer NOT NULL
);
