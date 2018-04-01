-- SQL data definition statements for the saved_recipies table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
DROP TABLE saved_recipies;

CREATE TABLE saved_recipies (
	userID character varying (10) NOT NULL,
	recipieID character varying (10) NOT NULL,
	PRIMARY KEY (userID, recipieID)
);
