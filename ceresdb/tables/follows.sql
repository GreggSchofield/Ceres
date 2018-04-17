-- SQL data definition statements for the follows table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
--DROP TABLE follows;

CREATE TABLE IF NOT EXISTS follows (
	userIDa MEDIUMINT NOT NULL,
	userIDb MEDIUMINT NOT NULL,
	dateOfFollow TIMESTAMP NOT NULL,
	weighting integer NOT NULL,
	FOREIGN KEY (userIDa) REFERENCES users(userID),
	FOREIGN KEY (userIDb) REFERENCES users(userID)
);
