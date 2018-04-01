-- SQL data definition statements for the recipie_tags table of the Ceres database.
-- Created: 19/03/18
-- Author: Gregg Schofield

-- comment this command out if you are attempting to create this table for the
-- first time.
DROP TABLE recipie_tags;

CREATE TABLE recipie_tags (
	recipieTagID character varying (10) UNIQUE NOT NULL PRIMARY KEY,
	tagName character varying (32) NOT NULL
);
