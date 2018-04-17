-- SQL data definition statements for the saved_recipes table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
--DROP TABLE saved_recipes;

CREATE TABLE IF NOT EXISTS saved_recipes (
	userID MEDIUMINT NOT NULL,
	recipeID MEDIUMINT NOT NULL,
	PRIMARY KEY (userID, recipeID)
);
