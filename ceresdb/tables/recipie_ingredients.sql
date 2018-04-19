-- SQL data definition statements for the recipe_ingredients table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
DROP TABLE recipe_ingredients;

CREATE TABLE IF NOT EXISTS recipe_ingredients (
	recipeID MEDIUMINT NOT NULL,
	ingredientID MEDIUMINT NOT NULL,
	weight REAL NOT NULL,
	FOREIGN KEY (recipeID) REFERENCES recipes(recipeID),
	FOREIGN KEY (ingredientID) REFERENCES ingredients(ingredientID)
);
