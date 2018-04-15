-- SQL data definition statements for the reviews table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
DROP TABLE reviews;

CREATE TABLE IF NOT EXISTS reviews (
	reviewID character varying (10) NOT NULL,
	userID character varying (10) NOT NULL,
	recipieID character varying (10) NOT NULL,
	reviewText text,
	rating smallint,
	dateTimePosted timestamp with time zone NOT NULL,
	FOREIGN KEY (userID) REFERENCES users (userID),
	FOREIGN KEY (recipieID) REFERENCES recipies (recipieID)
);
