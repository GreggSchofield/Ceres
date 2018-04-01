-- SQL data definition statements for the ingredients table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
DROP TABLE ingredients;

CREATE TABLE ingredients (
	ingredientID character varying (10) UNIQUE NOT NULL PRIMARY KEY,
	ingredientName character varying (64) NOT NULL,
	calories real NOT NULL,
	protein real NOT NULL,
	fat real NOT NULL,
	sugar real NOT NULL,
	fiber real NOT NULL,
	carbohydrates real NOT NULL,
	contentTags character varying (1000),
	weighting real NOT NULL
);
