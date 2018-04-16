-- SQL data definition statements for the recipies table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
--DROP TABLE recipies;

CREATE TABLE IF NOT EXISTS recipies (
	recipieID VARCHAR (10) UNIQUE NOT NULL,
	userID VARCHAR (10) NOT NULL,
	recipieName VARCHAR (100) NOT NULL,
	dateUploaded timestamp with time zone NOT NULL,
	pictureURL VARCHAR (64),
	steps VARCHAR (1000) NOT NULL,
	uses INT NOT NULL,
	recipieViews INT NOT NULL,
	tags VARCHAR (1000),
	servings INT NOT NULL,
	PRIMARY KEY (recipieID),
	FOREIGN KEY (userID) REFERENCES users (userID)
);
