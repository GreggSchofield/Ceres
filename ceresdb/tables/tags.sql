-- SQL data definition statements for the tags table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
-- DROP TABLE tags;

CREATE TABLE IF NOT EXISTS tags (
	tagID MEDIUMINT UNIQUE NOT NULL AUTO_INCREMENT,
	tagName VARCHAR (32) NOT NULL,
	PRIMARY KEY (tagID)
);
