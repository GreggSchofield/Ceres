-- SQL data definition statements for the reviews table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
DROP TABLE reviews;

CREATE TABLE reviews (
	reviewID character varying (10) NOT NULL,
	userID character varying (10) NOT NULL REFERENCES users (userID),
	recipieID character varying (10) NOT NULL REFERENCES recipies (recipieID),
	reviewText text,
	rating smallint,
	dateTimePosted timestamp with time zone NOT NULL
);
