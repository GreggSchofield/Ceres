-- SQL data definition statements for the user_ingredients table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
--DROP TABLE user_ingredients;

CREATE TABLE IF NOT EXISTS user_ingredients (
	userID MEDIUMINT NOT NULL,
	ingredientID MEDIUMINT NOT NULL,
	weighting integer NOT NULL,
	FOREIGN KEY (userID) REFERENCES users (userID),
	FOREIGN KEY (ingredientID) REFERENCES ingredients (ingredientID)
);
