-- SQL data definition statements for the reviews table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
--DROP TABLE reviews;

CREATE TABLE IF NOT EXISTS reviews (
	reviewID MEDIUMINT UNIQUE NOT NULL AUTO_INCREMENT,
	userID MEDIUMINT NOT NULL,
	recipeID MEDIUMINT NOT NULL,
	reviewText text,
	rating smallint,
	dateTimePosted TIMESTAMP NOT NULL,
	FOREIGN KEY (userID) REFERENCES users (userID),
	FOREIGN KEY (recipeID) REFERENCES recipes (recipeID)
);
