-- SQL data definition statements for the recipies table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
DROP TABLE recipies;

CREATE TABLE recipies (
	recipieID character varying (10) UNIQUE NOT NULL PRIMARY KEY,
	userID character varying (10) NOT NULL REFERENCES users (userID),
	recipieName character varying (100) NOT NULL,
	dateUploaded timestamp with time zone NOT NULL,
	pictureURL character varying (64),
	steps character varying (1000) NOT NULL,
	uses integer NOT NULL,
	recipieViews integer NOT NULL,
	tags character varying (1000),
	servings integer NOT NULL
);
