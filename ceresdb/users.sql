-- SQL data definition statements for the users table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
DROP TABLE users;

CREATE TABLE IF NOT EXISTS users (
	userID VARCHAR (10) UNIQUE NOT NULL,
	email VARCHAR (32) NOT NULL,
	password VARCHAR (20) NOT NULL,
	joinDate date NOT NULL,
	gender boolean,
	dateOfBirth date,
	displayName VARCHAR (20) NOT NULL,
	bio VARCHAR (20),
	dietaryRequirements VARCHAR (20),
	height FLOAT,
	weight FLOAT,
	activityLevel FLOAT,
	dateSinceLasAccess date NOT NULL,
	PRIMARY KEY (userID)
);
