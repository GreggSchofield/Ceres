-- SQL data definition statements for the users table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
DROP TABLE users;

CREATE TABLE users (
	userID character varying (10) UNIQUE NOT NULL PRIMARY KEY,
	email character varying (32) NOT NULL,
	password character varying (20) NOT NULL,
	joinDate date NOT NULL,
	gender boolean,
	dateOfBirth date,
	displayName character varying (20) NOT NULL,
	bio character varying (20),
	dietaryRequirements character varying (20),
	height real,
	weight real,
	activityLevel real,
	dateSinceLasAccess date NOT NULL
);
