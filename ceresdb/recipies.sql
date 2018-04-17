-- SQL data definition statements for the recipes table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
--DROP TABLE recipes;

CREATE TABLE IF NOT EXISTS recipes (
	recipeID MEDIUMINT UNIQUE NOT NULL AUTO_INCREMENT,
	userID MEDIUMINT NOT NULL,
	recipeName VARCHAR (100) NOT NULL,
	dateUploaded TIMESTAMP NOT NULL,
	pictureURL VARCHAR (64),
	steps VARCHAR (1000) NOT NULL,
	uses INT NOT NULL,
	recipeViews INT NOT NULL,
	tags VARCHAR (1000),
	servings INT NOT NULL,
	PRIMARY KEY (recipeID),
	FOREIGN KEY (userID) REFERENCES users (userID)
);
