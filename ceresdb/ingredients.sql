-- SQL data definition statements for the ingredients table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
--DROP TABLE ingredients;

CREATE TABLE IF NOT EXISTS ingredients (
	ingredientID INTEGER UNIQUE NOT NULL AUTO_INCREMENT,
	ingredientName VARCHAR (64) NOT NULL,
	calories FLOAT NOT NULL,
	protein FLOAT NOT NULL,
	fat FLOAT NOT NULL,
	sugar FLOAT NOT NULL,
	fiber FLOAT NOT NULL,
	carbohydrates FLOAT NOT NULL,
	contentTags VARCHAR (1000),
	weighting FLOAT NOT NULL,
	PRIMARY KEY (ingredientID)
);
